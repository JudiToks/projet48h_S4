<?php
// defined('BASEPATH') or exit('No direct script access allowed');	//protection fichier
require_once(APPPATH . 'controllers/Mysession.php');

class Balita extends Mysession
{

	public function index()
	{
		$this->load->view('login/acceuil.php');
		// $this->load->view('regime/calendrier.php');
		// $this->load->view('regime/listesport.php');
		// $this->redirect;
	}

	public function getmonnaieuser()
	{
		// SELECT *
		// FROM transaction
		// ORDER BY temps DESC
		// LIMIT 1;
		$id_user = $this->session->userdata('logged_in');

		$data['code'] = $this->Modelbdd->query("select * from transaction where iduser= " . $id_user . " ORDER BY temps DESC LIMIT 1", "*");
		$money = 0;
		foreach ($data['code']->result_array() as $m) {
			$money = $m['money'];
			return floatval($money);
		}
		// $string = "3.14";
		// $number = floatval($string);

		// echo $number; // Affiche 3.14

		return $money;
	}
	public function receive_valider_achat()
	{
		$data['gain'] =  $this->input->post('gain');
		$data['debut'] =  $this->input->post('debut');
		$data['plat'] =  $this->input->post('plats');
		$data['dates'] = $this->input->post('dates');
		$data['pack'] =  $this->input->post('pack');
		$data['delai'] =  $this->input->post('delai');
		$data['prix'] =  $this->input->post('prix');
		$data['money'] =  $this->input->post('money');
		$data['checkgain'] =  $this->input->post('checkgain');
		$data['sport'] =  $this->input->post('sport');

		$data['plat'] = str_replace(';', ',', $data['plat']);
		$id_user = $this->session->userdata('logged_in');

		$tab = array(
			'iduser' => $id_user,
			'sport' => $data['sport'],
			'objectif' => $data['checkgain'],
			'gain' => $data['gain'],
			'debut' => $data['debut'],
			'pack' => $data['pack'],
			'delai' => $data['delai'],
			'prix' => $data['prix'],
			'calendrier' => $data['dates']
		);
		$this->Modelbdd->insert("user_regime", $tab);



		// var_dump($data);

		$this->index();
	}

	public function valider_achat($data)
	{
		var_dump($data);
		$data['listsports'] = $this->Modelbdd->select("sport", "*");
		$data['listplats'] = $this->Modelbdd->select("plat", "*");

		$this->load->view('regime/valider_achat.php', $data);

		// print_r($array);
	}

	public function receive_payement()
	{
		$data['codeinsert']  = $this->input->post('code');
		$id_user = $this->session->userdata('logged_in');

		$data['code'] = $this->Modelbdd->select("code", "*");
		// session_start();

		foreach ($data['code']->result_array() as $m) {
			if ($m['designation'] == $data['codeinsert']) {
				// $this->Modelbdd->insert("demande_rechargement", $tab);
				$_SESSION['envoit'] = '<span style="color: green;">Votre demande de rechargement de compte a bien ete envoye </span>';
				$tab = array(
					'idcode' => $m['idcode'],
					'iduser' => $id_user
				);
				$this->Modelbdd->insert("validation_transaction", $tab);

				$this->payement();
				return;
			}
		}
		// $tab = array(
		// 	'code' => $data['code'],
		// 	'iduser' => $id_user
		// );
		// $this->Modelbdd->insert("transaction", $tab);

		$_SESSION['erreur'] = '<span style="color: red;">Veuillez verifiez votre code </span>';
		$this->payement();
	}

	public function payement($message = '')
	{
		// $this->load->view('template/header.php'); 
		$data['code'] = $this->Modelbdd->select("code", "*");
		if ($message != '') {
			$data['message'] = '<span style="color: red;">' . $message . ' </span>';
		}

		$this->load->view('payement/paiement.php', $data);



		// $this->load->view('template/footer.php');
	}

	public function receive_calendrier()
	{
		$data['sport'] = $this->input->post('sport');
		$data['gain']  = $this->input->post('gain');
		$data['debut'] = $this->input->post('debut');

		$data['prix']  = $this->input->post('prix');
		$data['pack']  = $this->input->post('pack');
		$data['delai']  = $this->input->post('delai');

		$data['dates']  = $this->input->post('dates');
		$data['money']  = $this->input->post('money');
		$data['plat']  = $this->input->post('plat');
		$data['checkgain']  = $this->input->post('checkgain');

		// var_dump($data);
		$this->valider_achat($data);
	}

	public function calendrier($data)
	{
		// var_dump($data);
		$this->load->view('regime/calendrier.php', $data);
	}


	public function liste_pack_tableau($gain = '', $debut = '', $sport = '', $checkgain = '', $plat = '')
	{
		$data['sport'] = $sport;
		$data['gain'] = $gain;
		$data['debut'] = $debut;
		$data['checkgain'] = $checkgain;
		$data['plat'] = $plat;
		// var_dump($data);

		$convention_kg = $this->Modelbdd->select("convention_kg", "*");
		$cvkg = array();
		$cvkg1 = array();
		$cvkg2 = array();

		foreach ($convention_kg->result_array() as $m) {
			$cvkg[] = $m['poids_depense_semaine'];
		}

		$convention_kg = $this->Modelbdd->select("convention", "*");
		foreach ($convention_kg->result_array() as $m) {
			$cvkg1[] = $m['poids'];
		}

		$convention_kg = $this->Modelbdd->select("prix_journalier", "*");
		foreach ($convention_kg->result_array() as $m) {
			$cvkg2[] = $m['prix_journalier'];
		}


		//calcul delai
		$data['easydelai']  = ceil($cvkg[0] * $gain * 7);
		$data['mediumdelai'] = ceil($cvkg[1] * $gain * 7);
		$data['harddelai'] = ceil($cvkg[2] * $gain * 7);

		//calcul prix
		$data['easyprix']  = ceil($data['easydelai'] * $cvkg1[0] * $cvkg2[0]);
		$data['mediumprix'] = ceil($data['mediumdelai'] * $cvkg1[1] * $cvkg2[1]);
		$data['hardprix'] = ceil($data['harddelai'] * $cvkg1[2] * $cvkg2[2]);

		$this->load->view('regime/liste_pack_tableau.php', $data);
	}
	public function receive_liste_pack_tableau()
	{
		$data['sport'] = $this->input->post('sport');
		$data['gain']  = $this->input->post('gain');
		$data['debut'] = $this->input->post('debut');

		$prix  = floatval($this->input->post('prix'));
		$data['prix']  = $prix;
		$data['pack']  = $this->input->post('pack');
		$data['delai']  = $this->input->post('delai');
		$data['plat']  = $this->input->post('plat');
		$data['checkgain']  = $this->input->post('checkgain');

		$money = $this->getmonnaieuser();


		// var_dump($_SESSION);
		// var_dump($data);
		// var_dump($money);
		if ($money == 0) {
			// echo "Le nombre est négatif";
			$this->payement("Veuillez recharger votre compte");
			return;
		}
		// var_dump($money, $prix);

		$money = $money - $prix;
		// var_dump($money);

		if ($money < 0) {
			// echo "Le nombre est négatif";
			$this->payement("Veuillez recharger votre compte11111");
		} else {
			$data['money'] = $money;
			$this->calendrier(
				$data
			);
		}
		return;
	}

	public function listesplats($gain = '', $debut = '', $sport = '', $checkgain = '')
	{

		$data['gain'] = $gain;
		$data['debut'] = $debut;
		$data['sport'] = $sport;
		$data['checkgain'] = $checkgain;
		// var_dump($data);

		$data['plat'] = $this->Modelbdd->selectwhere("categorie", $checkgain, "plat", "*");
		$this->load->view('regime/listeplat.php', $data);

		// $this->liste_pack_tableau($data['gain'], $data['debut'], $data['sport']);
	}
	public function receive_listesplats()
	{
		$data['gain'] = $this->input->post('gain');
		$data['debut'] = $this->input->post('debut');
		$data['checkgain'] = $this->input->post('checkgain');
		$data['sport'] = $this->input->post('sport');

		$data['variable'] = $this->input->post('variable');
		$array = explode(';', $data['variable']); // Conversion de la chaîne en tableau en utilisant le séparateur


		// foreach ($array as $value) {
		// 	echo $name . "<br>";
		// }

		$taboui = array();
		$i = 0;

		foreach ($array as $value) {
			// $name = 'plat' + $value;
			$data['value1'] = $this->input->post($value);
			echo $data['value1'];
			if ($data['value1'] == "oui") {
				// Ajouter les valeurs "oui" ou "non" au nouveau tableau
				$taboui[] = $i;
			}
			$i++;
		}
		$taboui = implode(';', $taboui);

		$data['plat'] = $taboui;
		// var_dump($data);
		$this->liste_pack_tableau($data['gain'], $data['debut'], $data['sport'], $data['checkgain'], $data['plat']);
	}
	public function listesport($gain = '', $debut = '', $checkgain = '')
	{

		$data['maison'] = $this->Modelbdd->selectwhere("categorie", "maison", "sport", "*");
		$data['salle'] = $this->Modelbdd->selectwhere("categorie", "en salle", "sport", "*");
		$data['exterieur'] = $this->Modelbdd->selectwhere("categorie", "exterieur", "sport", "*");
		$data['gain'] = $gain;
		$data['debut'] = $debut;
		$data['checkgain'] = $checkgain;
		// var_dump($data);
		$this->load->view('regime/listesport.php', $data);
	}
	public function receive_sport()
	{
		$data['variable'] = $this->input->post('variable');
		$data['variable'] = $this->input->post('variable');
		$array = explode(';', $data['variable']); // Conversion de la chaîne en tableau en utilisant le séparateur

		// $data['value1'] = $this->input->post('sport1');
		// $data['value2'] = $this->input->post('sport2');
		// $data['value3'] = $this->input->post('sport3');
		// $data['value4'] = $this->input->post('sport4');
		// $data['value5'] = $this->input->post('sport5');
		// $data['value6'] = $this->input->post('sport6');
		// $data['value7'] = $this->input->post('sport7');
		// $data['value8'] = $this->input->post('sport8');
		// $data['value9'] = $this->input->post('sport9');

		// $taboui = array();
		// $i = 0;
		// foreach ($data as $key => $value) {
		// 	if ($value == "oui") {
		// 		// Ajouter les valeurs "oui" ou "non" au nouveau tableau
		// 		$taboui[] = $i;
		// 	}
		// 	$i++;
		// }
		$taboui = array();
		$i = 0;

		foreach ($array as $value) {
			// $name = 'plat' + $value;
			$data['value1'] = $this->input->post($value);
			$newString = str_replace('sport', '', $value);

			echo $data['value1'];
			if ($data['value1'] == "oui") {
				// Ajouter les valeurs "oui" ou "non" au nouveau tableau
				$taboui[] = $newString;
			}
			$i++;
		}
		$taboui = implode(';', $taboui);

		// $data['plat'] = $taboui;


		$data['gain'] = $this->input->post('gain');
		$data['debut'] = $this->input->post('debut');
		$data['checkgain'] = $this->input->post('checkgain');

		$data2['gain'] = $data['gain'];
		$data2['debut'] = $data['debut'];
		$data2['checkgain'] = $data['checkgain'];
		$data2['sport'] = $taboui;
		// var_dump($data2);

		// $this->liste_pack_tableau($data2['gain'], $data2['debut'], $data2['sport'], $data2['checkgain']);
		$this->listesplats($data2['gain'], $data2['debut'], $data2['sport'], $data2['checkgain']);
	}


	public function choix_regime()
	{
		$this->load->view('regime/choix_regime.php');
	}

	public function receive_choix_regime()
	{
		$data['gain'] = $this->input->post('gain');
		$data['debut'] = $this->input->post('debut');
		$data['checkgain'] = $this->input->post('checkgain');
		$this->listesport($data['gain'], $data['debut'], $data['checkgain']);
	}
	// public function recherche($valeur = '')
	// {
	// 	$result1 = $this->Modelbdd->selectlike("nom", $valeur,  "categorie");
	// 	if ($result1 == False) {
	// 		$result1 = $this->Modelbdd->selectlike("username", $valeur,  "users");
	// 	}

	// 	return $result1;
	// }


	// 	public function acceuil()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$data['allsociete'] = $this->Modelbdd->select("societe", "*");
	// 		$data['devise'] = $this->Modelbdd->select("deviseEquivalence", "*");
	// 		$this->load->view('templates/header');
	// 		$this->load->view('acceuil', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function addsociete()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$nom = $this->input->post('nom');
	// 		$siege = $this->input->post('siege');
	// 		$phone = $this->input->post('phone');
	// 		$email = $this->input->post('email');
	// 		$telecope = $this->input->post('telecope');
	// 		$adresse = $this->input->post('adresse');
	// 		$capital = $this->input->post('capital');
	// 		$objet = $this->input->post('objet');
	// 		$idDeviseEquivalence = $this->input->post('idDeviseEquivalence');
	// 		$tab = array(
	// 			'nom' => $nom,
	// 			'objet' => $objet,
	// 			'siege' => $siege,
	// 			'phone' => $phone,
	// 			'mail' => $email,
	// 			'telecope' => $telecope,
	// 			'adresse' => $adresse,
	// 			'capitale' => $capital,
	// 			'idDeviseEquivalence' => $idDeviseEquivalence
	// 		);
	// 		$this->Modelbdd->insert("societe", $tab);

	// 		$result = $this->Modelbdd->selectwhere("nom", $nom, "societe", "idsociete");
	// 		$row = $result->row_array();
	// 		$idsociete = $row['idsociete'];
	// 		$nif = $this->input->post('nif');
	// 		$ns = $this->input->post('ns');
	// 		$nrcs = $this->input->post('nrcs');
	// 		$tab2 = array(
	// 			'idsociete' => $idsociete,
	// 			'NIF' => $nif,
	// 			'NS' => $ns,
	// 			'NRCS' => $nrcs,
	// 		);
	// 		$this->Modelbdd->insert("numero", $tab2);

	// 		// compte : 
	// 		// $debut = $this->input->post('debut');
	// 		// $tenuecompte = $this->input->post('tenuecompte');
	// 		// $tab3 = array(
	// 		// 	'idsociete' => $idsociete,
	// 		// 	'exercice' => $debut,
	// 		// 	'tenuecompte' => $tenuecompte,
	// 		// );
	// 		// $this->Modelbdd->insert("compte", $tab3);

	// 		redirect('balita/acceuil');
	// 	}

	// 	public function adddevisechange()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$idDeviseEquivalence = $this->input->post('idDeviseEquivalence');
	// 		$jour = $this->input->post('jour');
	// 		$taux = $this->input->post('taux');
	// 		$tab2 = array(
	// 			'idDeviseEquivalence' => $idDeviseEquivalence,
	// 			'jour' => $jour,
	// 			'taux' => $taux
	// 		);
	// 		$this->Modelbdd->insert("deviseChange", $tab2);
	// 		redirect('balita/devise');
	// 	}

	// 	public function societe($idsociete = '')
	// 	{
	// 		echo $idsociete;
	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$data['societe'] = $this->Modelbdd->selectwhere("idsociete", $idsociete, "societe", "*");
	// 		$data['numero'] = $this->Modelbdd->selectwhere("idsociete", $idsociete, "numero", "*");
	// 		// $data['compte'] = $this->Modelbdd->selectwhere("idsociete", $idsociete, "compte", "*");
	// 		$this->load->view('societe', $data);
	// 		$this->load->view('templates/footer');
	// 	}
	// 	public function plancomptable()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$this->load->view('templates/footer');
	// 	}
	// 	public function devise()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$data['deviseEquivalence'] = $this->Modelbdd->select("deviseEquivalence", "*");
	// 		$data['deviseChange'] = $this->Modelbdd->select("deviseChange", "*");
	// 		$this->load->view('devise', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function exercice($idsociete, $annee)
	// 	{
	// 		$this->load->view('templates/header');
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function ajoutecriture($idJournal = '')
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$data['journal'] = $this->Modelbdd->selectwhere("idJournal", $idJournal, "journal", "*");

	// 		$this->load->view('templates/header');
	// 		$data['idJournal'] = $idJournal;
	// 		$data['codeJournaux'] = $this->Modelbdd->select("codeJournaux", "*");
	// 		$data['compteGenerale'] = $this->Modelbdd->select("compteGenerale", "*");
	// 		$data['compteTiers'] = $this->Modelbdd->select("compteTiers", "*");
	// 		$data['deviseEquivalence'] = $this->Modelbdd->select("deviseEquivalence", "*");

	// 		$data['facture'] = $this->Modelbdd->selectwhere("idJournal", $idJournal, "facture", "*");

	// 		$this->load->view('ecriture', $data);
	// 		$this->load->view('templates/footer');
	// 	}



	// 	public function telechargement()
	// 	{
	// 		$this->load->view('templates/header');
	// 		$path = base_url('assets/document');
	// 		$liste = scandir($path);
	// 		$data['listefichier'] = $liste;
	// 		// $this->load->view('telechargement', $data);
	// 		var_dump($data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function import()
	// 	{
	// 		$this->load->view('templates/header');
	// 		$this->load->view('import');
	// 		$this->load->view('templates/footer');
	// 	}
	// 	public function export()
	// 	{
	// 		$this->load->view('templates/header');
	// 		$this->load->view('export');
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function receiveimport()
	// 	{
	// 		$this->load->model('M_csv');
	// 		$filecsv = $this->input->post('filecsv');
	// 		$table = $this->input->post('table');
	// 		$this->M_csv->importcsv($filecsv, $table);
	// 	}
	// 	public function receiveexport()
	// 	{
	// 		$this->load->model('M_csv');
	// 		$filecsv = $this->input->post('filecsv');
	// 		$table = $this->input->post('table');
	// 		$separateur = $this->input->post('separateur');
	// 		$this->M_csv->exportcomptecsv($separateur, $filecsv, $table);
	// 	}

	// 	public function ajoutexercice()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$data['typecodejournal'] = $this->Modelbdd->select("typecodejournal", "*");

	// 		$this->load->view('ajoutexercice', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function receiveajoutexercice()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$nomjournal = $this->input->post('nomjournal');
	// 		$debut = $this->input->post('debut');

	// 		// $days_to_add = 30;
	// 		$year_to_add = 1;
	// 		date_default_timezone_set('Asia/Tokyo');
	// 		$fin = date('Y-m-d', strtotime($debut . ' + ' . $year_to_add . ' years'));

	// 		$idTypecodejournal = $this->input->post('idTypecodejournal');
	// 		$tab = array(
	// 			'nom' => $nomjournal,
	// 			'idTypecodejournal' => $idTypecodejournal,
	// 			'debut' => $debut,
	// 			'fin' => $fin,
	// 		);
	// 		$this->Modelbdd->insert("journal", $tab);
	// 		redirect('balita/showexercice');
	// 	}
	// 	public function showexercice()
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$data['codeJournaux'] = $this->Modelbdd->select("codeJournaux", "*");
	// 		$data['journal'] = $this->Modelbdd->select("journal", "*");

	// 		$this->load->view('showexercice', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function deletetecriture($idFacture, $idJournal)
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		$this->Modelbdd->delete("idFacture", $idFacture, "facture");
	// 		redirect('balita/ajoutecriture/' . $idJournal);
	// 	}

	// 	public function addgrandlivre($idJournal)
	// 	{
	// 		$this->load->model('Modelbdd');
	// 		// $data['factures'] = $this->Modelbdd->selectwhere("idJournal", $idJournal, "facture", "*");
	// 		$data['factures'] = $this->Modelbdd->select("facture", "*");
	// 		$allcomptes = $this->Modelbdd->selectwhere("idJournal", $idJournal, "facture", "distinct(compte)");
	// 		$i = 0;
	// 		foreach ($allcomptes->result_array() as $compte) {
	// 			$tab = $this->Modelbdd->select2where("idJournal", $idJournal, "compte", $compte['compte'], "facture", "compte,debit,credit");
	// 			$allcredit = array();
	// 			$alldebit = array();
	// 			foreach ($tab->result_array() as $fac) {
	// 				$allcredit[] = $fac['credit'];
	// 				$alldebit[] = $fac['debit'];
	// 			}
	// 			$data['comptes'][$i]['numerocompte'] = $compte['compte'];
	// 			$data['comptes'][$i]['credit'] = $allcredit;
	// 			$data['comptes'][$i]['debit'] = $alldebit;
	// 			$i++;
	// 		}

	// 		$this->load->view('templates/header');
	// 		$this->load->view('ajoutgrandlivre', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function bilanexercice($idJournal = '')
	// 	{

	// 		$this->load->model('Modelbdd');
	// 		$this->load->view('templates/header');
	// 		$data['idJournal'] = $idJournal;
	// 		$data['journal'] = $this->Modelbdd->selectwhere("idJournal", $idJournal, "journal", "*");
	// 		$this->load->view('bilanexercice', $data);
	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function receivebilan()
	// 	{
	// 		$this->load->model('Modelbdd');

	// 		$idJournal = $this->input->post('idJournal');

	// 		$data['debut'] = $this->input->post('debut');
	// 		$data['cloture'] = $this->input->post('cloture');

	// 		$data['c20'] = $this->Modelbdd->getcomptebynum(20);
	// 		$data['c21'] = $this->Modelbdd->getcomptebynum(21);
	// 		$data['c22'] = $this->Modelbdd->getcomptebynum(22);
	// 		$data['c23'] = $this->Modelbdd->getcomptebynum(23);
	// 		$data['c25'] = $this->Modelbdd->getcomptebynum(25);

	// 		$this->load->view('templates/header');
	// 		$this->load->view('bilanactif', $data);

	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function financeResulat($dateDebut,$dateFin){
	// 		$this->load->model('Modelbdd');
	// 		$idJournal = $this->input->post('idJournal');

	// 		$data['debut'] = $this->input->post('debut');
	// 		$data['cloture'] = $this->input->post('cloture');

	// 		$data['c70'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,70);
	// 		$data['c71'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,71);
	// 		$data['productionExo']->$data['c70']['credit']+$data['c71']['credit'];
	// 		$data['c60'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,60);
	// 		$data['c61'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,61);
	// 		$data['c62'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,62);
	// 		$date['c61/62']=$data['c61']['debit']+$data['c62']['debit'];
	// 		$data['consommationExo']->$data['c60']['debit']+$date['c61/62'];
	// 		$data['valeurAjoute']->$data['productionExo']+$data['consommationExo'];
	// 		$data['c63'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,63);
	// 		$data['c64'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,64);
	// 		$data['exedentBrut']->$data['c63']['debit']+$date['c64']['debit'];

	// 		$data['c75'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,75);
	// 		$data['c65'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,65);
	// 		$data['c68'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,68);
	// 		$data['c78'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,78);
	// 		$data['resultatOperationel']->$data['c65']['debit']+$date['c68']['debit']+$date['c75']['credit']+$date['c78']['credit'];

	// 		$data['c76'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,76);
	// 		$data['c66'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,66);
	// 		$data['resultatFinancier']->$data['c66']['debit']+$date['c76']['credit'];
	// 		$data['resultAvImpot']->$data['resultatOperationel']+$data['resultatFinancier'];

	// 		$data['c692'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,692);
	// 		$data['c695'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,695);
	// 		$data['c7']=$data['c70']['credit']+$data['c71']['credit']+$data['c75']['credit']+$data['c78']['credit']+$data['c76']['credit'];
	// 		$data['c6']=$data['c63']['debit']+$date['c64']['debit']+$date['c60']['debit']+$date['c61']['debit']+
	// 		$date['c62']['debit']+$date['c65']['debit']+$date['c66']['debit']+$date['c68']['debit'];
	// 		$data['resultOrdinaire']=$data['c6']+$data['c7']+$data['c692']+$data['c695'];

	// 		$data['c77'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,77);
	// 		$data['c67'] = $this->Modelbdd->getEtatFinResulat($dateDebut,$dateFin,67);
	// 		$data['resultExtra']->$data['c77']['credit']+$date['c67']['debit'];

	// 		$data['resulatNet']=$data['resultOrdinaire']+$data['resultExtra'];

	// 		$this->load->view('templates/header');
	// 		//$this->load->view('bilanactif', $data);

	// 		$this->load->view('templates/footer');
	// 	}

	// 	public function bilanpassif()
	// 	{
	// 		$this->load->model('Modelbdd');

	// 		$this->load->view('templates/header');
	// 		$this->load->view('bilanpassif', $data);

	// 		$this->load->view('templates/footer');
	// 	}

}
