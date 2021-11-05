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
		}

		function FancyTable($header, $data)
		{
			// Couleurs, épaisseur du trait et police grasse
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128, 0, 0);
			$this->SetLineWidth(.3);
			$this->SetFont('', 'B');
			// En-tête
			$w = array(40, 35, 45, 40);
			for ($i = 0; $i < count($header); $i++) {
				var_dump($header[$i]);
				echo("<br>");
				$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
			}
			$this->Ln();
			// Restauration des couleurs et de la police
			$this->SetFillColor(224, 235, 255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Données
			$fill = false;
			foreach ($data as $row) {
				$this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
				$this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
				$this->Cell($w[2], 6, number_format($row[2], 0, ',', ' '), 'LR', 0, 'R', $fill);
				$this->Cell($w[3], 6, number_format($row[3], 0, ',', ' '), 'LR', 0, 'R', $fill);
				$this->Ln();
				$fill = !$fill;
			}
			// Trait de terminaison
			$this->Cell(array_sum($w), 0, '', 'T');
		}

		// Pied de page
		function Footer()
		{
			$this->SetY(-15);
			$this->SetDrawColor(255, 0, 0);
			$this->SetFillColor(255, 0, 0);
			$this->SetTextColor(255, 255, 255);

			$this->SetFont('Arial', 'B', 12);
			$this->Cell(190, 9, 'Page ' . $this->PageNo() . '/{nb}', 1, 1, 'C', true);
		}
	}

	// Instanciation de la classe dérivée
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$header = array('v.id', 'type', 'prix', 'caract');

	require("./model/cars.php");
	$Cars[] = description(1);
	$Cars[] = description(2);

	$pdf->FancyTable($header, $Cars);
	$pdf->Output();
}
