<?php

require_once ('student.class.php');

class StudentRegister implements StudentInterface
{
    //pdo objektet
    private $db;

    //Konstruktør
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Metoden for å vise alle studenter
     public function visAlleStudenter() : array
    {
        //variabel med et tomt array
        $arrStudenter = array();
        try {
            global $db;
            $sql = "SELECT id, etternavn, fornavn FROM student ORDER BY etternavn";
            $resultat = $db->query($sql);
            while ($student = $resultat->fetchObject('student'))
            {
                //Fylle inn arrayet med student-objekter
                $arrStudenter[] = $student;
            }
        }
        catch (Exception $e) {
            print $e->getMessage().PHP_EOL;
        }
        return $arrStudenter;
    }

    //Metoden for å vise info om en student slik at man kan redigere opplysningene
    public function visEnkelStudent(int $value) : array
    {
        // TODO: Implement visEnkelStudent() method.
        $arrInfoStudent = array();
        try {
            global $db;
            $sql = "SELECT * FROM student s INNER JOIN klasse k ON s.klasse = k.navn WHERE s.id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $value, PDO::PARAM_INT);
            $stmt->execute();
            while ($radInfoStudent = $stmt->fetchAll()) {
                $arrInfoStudent[] = $radInfoStudent;
            }

        } catch (Exception $e) {
            print $e->getMessage().PHP_EOL;
        }
        return $arrInfoStudent;
    }

    //Metode for vise alle klasser som fins
    public function visKlasse() : array
    {
        $arrKlasse = array();
        try {
            global $db;
            $sql = "SELECT navn FROM klasse";
            $resultat = $db->query($sql);
            while ($alleKlasser = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                $arrKlasse[] = $alleKlasser;
            }
        }
        catch (Exception $e)
        {
            print $e->getMessage().PHP_EOL;
        }
        return $arrKlasse;
    }

    //Metode for å vise alle studenter som tilhører en valgt klasse
    public function visStudenterTilValgtKlasse(string $valgtKlasse) : array
    {
        $arrKlasseStudenter = array();
        try
        {
            global $db;
            $sql = "SELECT etternavn, fornavn FROM student s INNER JOIN klasse k ON s.klasse = k.navn WHERE k.navn = :klasse ORDER BY s.etternavn";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':klasse', $valgtKlasse, PDO::PARAM_STR);
            $stmt->execute();

            while ($student = $stmt->fetchObject('Student'))
            {
                $arrKlasseStudenter[] = $student;
            }

        }
        catch (InvalidArgumentException $e)
        {
            print $e->getMessage() . PHP_EOL;
        }
        return $arrKlasseStudenter;

    }

    //Metode for å registrere en ny student
    public function leggTilNyStudent(Student $student) : int
    {
        // TODO: Implement leggTilNyStudent() method.
        try {
            global $db;
            $etter_navn = $student->hentEtterNavn();
            $for_navn = $student->hentForNavn();
            $klasse = $student->hentKlasse();
            $tlf_nr = $student->hentMobil();
            $nett_side= $student->hentNettSide();
            $epost_adresse= $student->hentEpost();
            $dato_oppretting= $student->hentDatoOppretting();

            $sql = "INSERT INTO student (etternavn, fornavn, klasse, mobil, www, epost, opprettet) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $verdier = array($etter_navn, $for_navn, $klasse, $tlf_nr, $nett_side, $epost_adresse, $dato_oppretting);

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':etterNavn', $etter_navn, PDO::PARAM_STR,15);
            $stmt->bindParam(':forNavn', $for_navn, PDO::PARAM_STR,30);
            $stmt->bindParam(':klasse', $klasse, PDO::PARAM_INT, 5);
            $stmt->bindParam(':tlfNr', $tlf_nr, PDO::PARAM_INT, 8);
            $stmt->bindParam(':nettSide', $nett_side, PDO::PARAM_STR,50);
            $stmt->bindParam(':epostAdresse', $epost_adresse, PDO::PARAM_STR, 40);
            $stmt->bindParam(':datoOppretting', $dato_oppretting, PDO::PARAM_INT, 20);

            if ($stmt->execute($verdier)) {
                $id = $db->lastInsertId();
                return $id;
            }
        } catch (Exception $e) {
            print $e->getMessage().PHP_EOL;
        }
    }

    //Metode for å oppdatere students opplysniger
    public function oppdaterInfoStudent(Student $student ) : string
    {
        // TODO: Implement oppdaterInfoStudent() method.
        try {
            global $db;
            $etter_navn = $student->hentEtterNavn();
            $for_navn = $student->hentForNavn();
            $klasse = $student->hentKlasse();
            $tlf_nr = $student->hentMobil();
            $nett_side= $student->hentNettSide();
            $epost_adresse= $student->hentEpost();
            $dato_oppretting= $student->hentDatoOppretting();
            $id = $student->hentId();

            $sql = "UPDATE student SET etternavn = '$etter_navn', fornavn = '$for_navn', klasse = '$klasse', mobil = '$tlf_nr', www = '$nett_side', epost = '$epost_adresse', opprettet = '$dato_oppretting' WHERE id = '$id'";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':etterNavn', $etter_navn, PDO::PARAM_STR,15);
            $stmt->bindParam(':forNavn', $for_navn, PDO::PARAM_STR,30);
            $stmt->bindParam(':klasse', $klasse, PDO::PARAM_STR, 5);
            $stmt->bindParam(':tlfNr', $tlf_nr, PDO::PARAM_INT, 8);
            $stmt->bindParam(':nettSide', $nett_side, PDO::PARAM_STR,50);
            $stmt->bindParam(':epostAdresse', $epost_adresse, PDO::PARAM_STR, 40);
            $stmt->bindParam(':datoOppretting', $dato_oppretting, PDO::PARAM_INT, 20);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $str = 'Studentinfo oppdatert';
                return $str;
            }
        } catch (Exception $e) {
            print $e->getMessage().PHP_EOL;
        }
    }
}