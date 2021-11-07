<?php
function create()
{
	$errors = false;
	if (count($_POST) > 0) {
		$user_info = array(
			"nom" => $_POST["nom"],
			"pseudo" => $_POST["pseudo"],
			"mdp" => $_POST["mdp"],
			"email" => $_POST["email"],
			"nomE" => $_POST["nomE"],
			"adresseE" => $_POST["adresseE"]
		);
		require("./model/clientBD.php");
		$errors = valid_registration($user_info);
		if (count($errors) <= 0 && ($id_user = new_user($user_info)) >= 0) {
			$_SESSION['user_info'] = $user_info;
			$_SESSION['user_info']['id'] = $id_user;
			$_SESSION['loggedin'] = 0;
			$nexturl = "index.php?page=accounts&action=accueil";
			header("Location:" . $nexturl);
			return;
		}
		$errors[] = "Echec de l'inscription. Si aucune autre erreur n'est affichée, c'est probablement une erreur de la base de données.";
	}
	require("./views/accounts/create.php");
}

function accueil()
{
	require("views/home/home.php");
}

function connect()
{
	$_SESSION['successfulConnection'] = -1;
	if (count($_POST) > 0) {
		$user_info = array(
			"pseudo" => $_POST["pseudo"],
			"mdp" => $_POST["mdp"]
		);
		require("./model/clientBD.php");
		if (verif_bd($user_info['pseudo'], $user_info['mdp'], $user_info)) {
			$_SESSION['user_info'] = $user_info;
			$_SESSION['user_info']['id'] = $id_user;
			$_SESSION['loggedin'] = 0;
			unset($_SESSION['successfulConnection']);
			$nexturl = "index.php?page=accounts&action=accueil";
			header("Location:" . $nexturl);
			return;
		}
	}
	require("./views/accounts/connect.php");
}

function getBill()
{
	require('./FPDF/fpdf.php');

	class PDF extends FPDF
	{
		// En-tête
		function Header()
		{
			//red part
			$this->SetX(5);
			$this->SetY(5);

			$this->SetDrawColor(255, 0, 0);
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255, 0, 0);

			$this->Cell(190, 9, "", 1, 1, 'C', true);

			//grey part
			$this->SetX(5);
			$this->SetY(14);

			$this->SetDrawColor(247, 243, 243);
			$this->SetFillColor(247, 243, 243);
			$this->SetTextColor(247, 243, 243);

			$this->Cell(190, 50, "", 1, 1, 'C', true);


			// Logo
			$this->Image('./views/home/logo.png', 15, 25, 50);

			$this->SetXY(140, 25);

			$this->SetTextColor(127, 122, 122);
			$this->SetFont('Times', 'B', 15);
			$this->SetFontSize(15);

			$this->Cell(60, 10, 'FACTURE', 1, 0, 'C');

			$this->SetXY(140, 33);
			$this->SetFont('Times', '', 15);

			$today = date("m.d.y");
			$this->Cell(60, 10, 'Date : ' . $today, 1, 0, 'C');

			$this->SetXY(153, 41);

			$this->SetFillColor(0, 0, 0);
			$this->Cell(34, 0.4, '', 1, 0, 'C', true);

			$this->SetXY(140, 42);
			$this->SetFont('Times', '', 15);

			$this->Cell(60, 10, 'No. de facture : 1', 1, 0, 'C'); //$_SESSION['facture']['id']

			$this->SetXY(151, 50);

			$this->SetFillColor(0, 0, 0);
			$this->Cell(38, 0.4, '', 1, 0, 'C', true);
			$this->Ln();
			$this->Cell(0, 20, '', 0, 1);
		}

		function EnterpriseInfos($info_to_fill, $user_info)
		{
			$this->SetFillColor(247, 243, 243);
			$this->SetTextColor(127, 122, 122);
			$this->SetLineWidth(.3);
			$this->SetXY(40, 70);
			$w = array(35, 35, 35, 35, 35);
			for ($i = 0; $i < count($info_to_fill); $i++) {
				$this->SetX(40);
				$this->Cell($w[$i], 12, $info_to_fill[$i], 0, 1, 'C', true);
			}
			$this->SetFillColor(127, 122, 122);
			$this->SetXY(42, 80);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 92);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 104);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 116);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 128);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetFillColor(247, 243, 243);
			$this->SetXY(86, 70);
			$this->Cell(80, 12, $user_info['id'], 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, $user_info['nom'], 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, $user_info['email'], 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, $user_info['nomE'], 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, $user_info['adresseE'], 0, 1, 'C', true);

			$this->SetFillColor(127, 122, 122);
			$this->SetXY(88, 80);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 92);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 104);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 116);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 128);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);
		}

		function RentedVehicule($header, $data)
		{
			$this->SetFillColor(247, 243, 243);
			$this->SetTextColor(127, 122, 122);
			$this->SetLineWidth(.3);
			$this->SetXY(84,145);
			$this->Cell(40, 10, "Voiture a louer : ", 1, 0, 'C', false);
			$this->SetXY(40, 160);
			$w = array(35, 35, 35, 35, 35);
			for ($i = 0; $i < count($header); $i++) {
				$this->SetX(40);
				$this->Cell($w[$i], 12, $header[$i], 0, 1, 'C', true);
			}
			$this->SetFillColor(127, 122, 122);
			$this->SetXY(42, 170);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 182);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 194);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(42, 206);
			$this->Cell(31, 0.1, '', 0, 0, 'C', true);

			$this->SetFillColor(247, 243, 243);
			$this->SetXY(86, 160);
			$this->Cell(80, 12, "", 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, "", 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, "", 0, 1, 'C', true);
			$this->SetX(86);
			$this->Cell(80, 12, "", 0, 1, 'C', true);

			$this->SetFillColor(127, 122, 122);
			$this->SetXY(88, 170);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 182);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 194);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			$this->SetXY(88, 206);
			$this->Cell(76, 0.1, '', 0, 0, 'C', true);

			// // Couleurs, épaisseur du trait et police grasse
			// $this->SetFillColor(255, 0, 0);
			// $this->SetTextColor(255);
			// $this->SetDrawColor(128, 0, 0);
			// $this->SetLineWidth(.3);
			// $this->SetFont('Times', 'B');
			// $this->SetXY(10, 140);
			// // En-tête
			// $w = array(45, 45, 45, 45);
			// for ($i = 0; $i < count($header); $i++) {
			// 	$this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', true);
			// }
			// $this->Ln();
			// // Restauration des couleurs et de la police
			// $this->SetFillColor(224, 235, 255);
			// $this->SetTextColor(0);
			// $this->SetFont('');
			// // Données
			// $fill = false;
			// foreach ($data as $row) {
			// 	$this->Cell($w[0], 12, "", 'LR', 0, 'L', $fill);
			// 	$this->Cell($w[1], 12, "", 'LR', 0, 'L', $fill);
			// 	$this->Cell($w[2], 12, "", 'LR', 0, 'R', $fill);
			// 	$this->Cell($w[3], 12, "", 'LR', 0, 'R', $fill);
			// 	$this->Ln();
			// 	$fill = !$fill;
			// }
			// // Trait de terminaison
			// $this->Cell(array_sum($w), 0, '', 0, 1, 'T');
			// if(count($data)>10){
			// 	$this->Cell(array_sum($w), 10, 'Total a payer (avec reduction 10%)* : ', 'T'); //. $_SESSION['facture']['total'] / 10
			// } else {
			// 	$this->Cell(array_sum($w), 10, 'Total a payer (sans reduction 10%)* : ', 'T'); //. $_SESSION['facture']['total']
			// }

		}

		// Pied de page
		function Footer()
		{
			$this->SetY(-25);
			$this->SetFontSize(12);
			$this->SetTextColor(0, 0, 0);
			$this->Cell(10, 10, '* Beneficiez d\'une reduction de 10% en louant au moins 10 voitures.', 0, 0);

			$this->SetY(-15);
			$this->SetDrawColor(255, 0, 0);
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255, 255, 255);

			$this->SetFont('Times', 'B', 15);
			$this->Cell(190, 9, 'Page ' . $this->PageNo() . '/{nb}', 1, 1, 'C', true);
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$header = array('v.id :', 'type :', 'caract :', 'prix :');

	require("./model/cars.php");
	$Cars[] = description(1);
	$Cars[] = description(2);
	$info_to_fill = array('Identifiant :', 'Nom :', 'E-mail :', 'Entreprise :', 'Adresse :');
	$user_info = $_SESSION['user_info'];
	$pdf->EnterpriseInfos($info_to_fill, $user_info);
	$pdf->RentedVehicule($header, $Cars);
	$pdf->Output();
}
