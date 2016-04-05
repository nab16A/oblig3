<?php


interface StudentInterface
{
    public function visAlleStudenter() : array;
    public function visEnkelStudent(int $value) : array;
    public function visKlasse() : array;
    public function visStudenterTilValgtKlasse(string $value) : array;
    public function leggTilNyStudent(Student $student) : int;
    public function oppdaterInfoStudent(Student $student) : string;
}