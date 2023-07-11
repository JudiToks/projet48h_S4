<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modelbdd extends CI_Model

{
    // Afficher la requête SQL résultante
    // $sql = $this->db->last_query();
    // echo $sql;

    //     $data = array(
    //         'title' => 'My title',
    //         'name' => 'My Name',
    //         'date' => 'My date'
    // );

    // $this->db->insert('mytable', $data);
    // // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')

    public function insert($nomtable, $data)
    {
        // create table societe(
        //     idsociete serial primary key,
        //     nom varchar(20) not null,
        //     siege varchar(20) not null,
        //     phone int not null,
        //     telecope int,
        //     mail varchar(30),
        //     addresse varchar(30),
        //     capitale varchar(30)
        // );

        $this->db->insert($nomtable, $data);
        echo "coucou";

        // return ;
    }
    public function update($colcondition, $valeurcondition, $nomtable, $data)
    {

        //     $data = array(
        //         'title' => $title,
        //         'name' => $name,
        //         'date' => $date
        // );

        // $this->db->where('id', $id);
        // $this->db->update('mytable', $data);
        // // Produces:
        // //
        // //      UPDATE mytable
        // //      SET title = '{$title}', name = '{$name}', date = '{$date}'
        // //      WHERE id = $id

        $this->db->where($valeurcondition, $colcondition);
        $this->db->update($nomtable, $data);
        return;
    }

    public function select($nomtable, $colonnes)
    {
        // $this -> db -> select ( 'titre, contenu, date' );
        // $query  =  $this -> db -> get ( 'mytable' );
        $this->db->select($colonnes);
        $query  =  $this->db->get($nomtable);
        return $query;
    }
    public function selectwhere($colcondition, $valeurcondition, $nomtable, $colonnes)
    {
        $this->db->select($colonnes);
        $this->db->where($colcondition, $valeurcondition);
        $query  =  $this->db->get($nomtable);
        $sql = $this->db->last_query();
        echo $sql;

        return $query;
    }

    public function select2where($colcondition, $valeurcondition, $colcondition2, $valeurcondition2, $nomtable, $colonnes)
    {
        $this->db->select($colonnes);
        $this->db->where($colcondition, $valeurcondition);
        $this->db->where($colcondition2, $valeurcondition2);
        $query  =  $this->db->get($nomtable);
        // Afficher la requête SQL résultante
        // $sql = $this->db->last_query();
        // echo $sql;

        return $query;
    }


    public function delete($colcondition, $valeurcondition, $nomtable)
    {
        // Produces:
        // DELETE FROM mytable
        // WHERE id = $id

        // $this->db->where('id', $id);
        // $this->db->delete('mytable');


        $this->db->where($colcondition, $valeurcondition);
        $this->db->delete($nomtable);
        return;
    }

    public function selectlike($nomcol, $valeur, $nomtable)
    {
        $this->db->like($nomcol, $valeur, 'both');
        $query = $this->db->get($nomtable);

        // Vérifier le nombre de résultats
        if ($query->num_rows() == 0) {
            return false;
        }

        // Afficher la requête SQL résultante
        $sql = $this->db->last_query();
        echo $sql;

        return $query;
    }

    // public function selectjoinwhere($colcondition, $valeurcondition, $nomtable, $colonnes, $nomtable2, $on)
    // {
    //     $this->db->select($colonnes);
    //     $this->db->from($nomtable);
    //     $this->db->join($nomtable2, $on);
    //     // $this->db->where($valeurcondition, $colcondition);

    //     // select * from detailFacture join facture on facture.idFacture=detailFacture.idFacture where idJournal=1
    //     // $this->db->select(' * from detailFacture join facture on facture.idFacture=detailFacture.idFacture where idJournal=1', FALSE);
    //     // $query = $this->db->get('detailFacture');

    //     $query = $this->db->get();
    //     return $query;
    // }
    public function gerfacturedetailfacture($idJournal)
    {
        // select * from detailFacture join facture on facture.idFacture=detailFacture.idFacture where idJournal=1
        $this->db->select(' * from detailFacture join facture on facture.idFacture=detailFacture.idFacture where idJournal=' . $idJournal, FALSE);
        $query = $this->db->get();

        return $query;
    }

    // select * from comptegenerale where numero like '20%' order by numero;
    public function getcomptebynum($num)
    {
        $query = $this->db->query('select * from comptegenerale where numero like \'' . $num . '%\' order by numero');
        return $query;
    }

    // select compte,facture.idJournal,sum(credit),sum(debit),debut,fin from facture join journal on facture.idJournal=journal.idJournal where compte = 10100 and debut >= '2023-04-21'
    public function getdmoinscbynum($num, $debut, $cloture)
    {
        $query = $this->db->query(
            'select facture.idJournal,sum(credit)-sum(debit) as dmoinsc,debut,fin
             from facture join journal on facture.idJournal=journal.idJournal 
             where compte =' . $num . ' and debut >=\'' . $debut . '\' and fin <=\'' . $cloture . '\' '
        );
        $result = array();
        foreach ($query->result_array() as $c) {
            $result['dmoinsc'] = $c['dmoinsc'];
        }
        // var_dump($result);
        return $result;
    }

    public function getEtatFinResulat()
    {
    }
}
