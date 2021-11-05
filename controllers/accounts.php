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

		function Header()
		{
			// Logo
			$this->Image('./views/logo.png', 10, 6, 30);
			// Police Arial gras 15
			$this->SetFont('Arial', 'B', 15);
			// Décalage à droite
			$this->Cell(80);
			// Titre
			$this->Cell(30, 10, 'Titre', 1, 0, 'C');
			// Saut de ligne
			$this->Ln(20);
		}

		// Chargement des données
		function LoadData($file)
		{
			// Lecture des lignes du fichier
			$lines = file($file);
			$data = array();
			foreach ($lines as $line)
				$data[] = explode(';', trim($line));
			return $data;
		}

		// Tableau simple
		function BasicTable($header, $data)
		{
			// En-tête
			foreach ($header as $col)
				$this->Cell(40, 7, $col, 1);
			$this->Ln();
			// Données
			foreach ($data as $row) {
				foreach ($row as $col)
					$this->Cell(40, 6, $col, 1);
				$this->Ln();
			}
		}

		// Tableau amélioré
		function ImprovedTable($header, $data)
		{
			// Largeurs des colonnes
			$w = array(40, 35, 45, 40);
			// En-tête
			for ($i = 0; $i < count($header); $i++)
				$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
			$this->Ln();
			// Données
			foreach ($data as $row) {
				$this->Cell($w[0], 6, $row[0], 'LR');
				$this->Cell($w[1], 6, $row[1], 'LR');
				$this->Cell($w[2], 6, number_format($row[2], 0, ',', ' '), 'LR', 0, 'R');
				$this->Cell($w[3], 6, number_format($row[3], 0, ',', ' '), 'LR', 0, 'R');
				$this->Ln();
			}
			// Trait de terminaison
			$this->Cell(array_sum($w), 0, '', 'T');
		}

		// Tableau coloré
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
			for ($i = 0; $i < count($header); $i++)
				$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
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
	}

	$pdf = new PDF();
	// Titres des colonnes
	$header = array('Pays', 'Capitale', 'Superficie (km²)', 'Pop. (milliers)');
	// Chargement des données
	$data = $pdf->LoadData('pays.txt');
	$pdf->AddPage();
	$pdf->FancyTable($header, $data);
	$pdf->Output();
}
