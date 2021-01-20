<?php
// ............... 1 .............
/*
    Pattern-ul Singleton garantează că în cod veți crea doar o singură instanță a unui anumit obiect.
*/
    // class ClasaMea { }
    // $a = new ClasaMea();
    // $b = new ClasaMea();
    // echo $a===$b;

// ............... 2 .............
    // class ClasaMea{
    // public static $instanta;
    // private function __construct(){ }
    // public static function GetInstance(){
    //     if(!isset($instanta))
    //         self::$instanta = new ClasaMea();
    //     return $instanta;
    //     }
    // }

    // $a = ClasaMea::GetInstance();
    // $b = ClasaMea::GetInstance();
    // echo $a===$b;

// ............... 3 .............
/*
    Pattern-ul Observer permite ca starea unui singur obiect (Subject) să
    fie emisă la o varietate de obiecte (Subscribers) care supraveghează
    proiectul. Acest concept simplu poate fi comparat cu un abonament la
    un ziar. Atâta timp cât este valabil abonamentul, ziarul va fi livrat.
    Când anulăm abonamentul, nu vom mai primi ziarul.Știm că Observer-ul 
    trebuie să aibă o metodă care să-l informeze despre noile date. 
    Aceasta poate fi metoda update:
*/

    // interface IObserver{
    //     function update($sender, $args);
    // }
    // interface IDistributer{
    //     public function adaugaAbonat($p);
    //     public function reziliazaAbonat($p);
    //     public function trimiteUpdate();
    // }
    // class Abonat implements IAbonat{
    //         private $nume;
    //     public function __construct($nume){
    //         $this->nume = $nume;
    //     }
    //     public function update($sender, $eventArgs){
    //         echo "Modifica: (" . $this->nume . ") " . $eventArgs . "<br>";
    //     }
    // }
    // class Distributor implements IDistributor{
    //         private $totiAbonatii;
    //     public function adaugaAbonati($p){
    //         $this->totiAbonatii[] = $p;
    //     }
    //     public function reziliazaAbonati($p){
    //         unset($this->totiAbonatii[array_search($p,$this->totiAbonatii)]);
    //     }
    //     public function modifica(){
    //         $this->posaljiUpdate();
    //     }
    //     public function trimiteUpdate(){
    //         foreach($this->totiAbonatii as $pp){
    //             $pp->update($this,"Cele mai recente modificari");
    //         }
    //     }
    // }
    
    // $d = new Distributor();
    // $d->adaugaAbonati(new Abonat("p1"));
    // $d->adaugaAbonati(new Abonat("p2"));
    // $d->modifica();

// ............... 4 .............
/*
    Factory - Acest pattern se utilizează atunci când dorim să folosim o clasă
    intermediară, prin care să creăm instanța unei anumite clase. Să
    presupunem că în sistem avem clase multiple de utilizatori, din care
    dorim să creăm doar una singură, pe baza fluxului de program: 
*/

    // class UtilizatorObisnuit{ 
    //     public function __construct() { 
    //         echo "salututilizator"; 
    //     } 
    // }
    // class Administrator{ 
    //     public function __construct() { 
    //         echo "salut administrator"; 
    //     } 
    // }
    // class SuperAdministrator{ 
    //     public function __construct() { 
    //         echo "salut superadministrator"; 
    //     } 
    // }

    // $tip = "Administrator";
    // switch($tip){
    //     case "UtilizatorObisnuit":
    //         $utilizator = new UtilizatorObisnuit();
    //     break;
    //     case "Administrator":
    //         $utilizator = new Administrator();
    //     break;
    //     case "SuperAdministrator":
    //         $utilizator = new SuperAdministrator();
    //     break;
    // } 

    // class ClasaFactory{
    //     public static function UtilizatorNou($tip){
    //         switch($tip){
    //             case "UtilizatorObisnuit":
    //                 return new UtilizatorObisnuit();
    //             break;
    //             case "Administrator":
    //                 return new Administrator();
    //             break;
    //             case "SuperAdministrator":
    //                 return new SuperAdministrator();
    //             break;
    //         }
    //     }
    // }
    // echo "<br>";
    // $utilizator = ClasaFactory::UtilizatorNou("SuperAdministrator");

// ............... 5 ............. 
/*
    Pattern-ul Decorator permite o modificare (adăugare) de funcționalități
    într-o clasă existentă, unde, spre deosebire de moștenirea clasică,
    clasa Decorator nu este într-o relație ierarhică directă cu clasa pe care
    o ”decorează”.

    Să presupunem că avem o clasă dreptunghi pe care dorim să o
    modificăm. Clasa inițială are o metodă pentru calcularea suprafeței:
*/

    // class Dreptunghi{
    //     private $a;
    //     private $b;

    //     public function __construct($a, $b){
    //         $this->a = $a;
    //         $this->b = $b;
    //     }
    //     public function suprafata(){
    //         return $this->a * $this->b;
    //     }
    // }

/*
    Creăm apoi clasa Decorator care nu este altceva decât un înveliș pentru clasa de bază:
*/

    // class DecoratorDreptunghi{
    //     protected $dreptunghi;
    //     protected $a;
    //     protected $b;

    //     public function construct(Dreptunghi $dreptunghi){
    //         $this->dreptunghi = $dreptunghi;
    //         $this->a = $this->dreptunghi->a;
    //         $this->b = $this->dreptunghi->b;
    //     }
    //     public function volum(){
    //         return 2*($this->a + $this->b);
    //     }
    // }

    // $p = new Dreptunghi(2, 5);
    // echo $p->suprafata();
    // $pd = new DecoratorDreptunghi($p);
    // echo $pd->volum();

// ............... 5 ............. 
/*
    Pattern-ul Chain of Command - Acest șablon centralizează comenzile (metodele) 
    într-o singură clasă, sau într-o listă de comenzi. Pentru fiecare comandă 
    avem nevoie de o clasă separată, de unde tragem concluzia că acest pattern 
    va fi folosit rar pentru sistemele mai mici. Pentru a-l implementa, avem 
    nevoie de două interfețe (bineînțeles, interfeţele nu sunt necesare, însă
    fără ele va fi greu de obținut integritatea, atunci când creăm un sistem mai
    mare). Una pentru fiecare clasă cu o comandă, iar cealaltă pentru
    clasa care va servi comenzile:
*/

    // interface IComanda{
    //     public function executa($comanda, $parametrii);
    // }
    // interface IControlerComanda{
    //     public function adaugaComanda($comanda);
    //     public function executaComanda($comanda, $parametrii);
    // }

/*
    Mai apoi creăm o clasă care va fi utilizată cu rol de controler. Această
    clasă conține un tablou (array) în care vor fi localizate toate comenzile
    înregistrate. Adică, comenzile pe care le înregistrăm în timpul
    executării:
*/

    // class ControlerComenzi implements IControlerComenzi{
    //     private $_comenzi = array();
    //     public function executaComanda($comanda, $parametrii){
    //         if (count($this->_comenzi) > 0){
    //             foreach ($this->_comenzi as $clasaComanda){
    //                 if ($clasaComanda->iexecuta($comanda, $parametrii)){
    //                     return;
    //                 }
    //             }
    //         }
    //     }
    //     public function adaugaComanda($clasaComanda){
    //         $this->_comenzi[] = $clasaComanda;
    //     }
    // }

/*
    Vom crea două comenzi: comanda salut, care afișează un mesaj și comanda timp, 
    care va afișa timpul exact:
*/
    // class ComandaSalut implements IComanda{
    //     public function executa($numeComanda, $parametrii){
    //         if ( $numeComanda != "salut" ){
    //             return false;
    //         }
    //         echo( "Salut " . $parametrii );
    //             return true;
    //     }
    // }
    // class ComandaTimp implements IComanda{
    //     public function executa($numeComanda, $parametrii){
    //         if ( $numeComanda != "timp" ){
    //             return false;
    //         }
    //         echo( "Timpul exact este " . date("h:i:s") );
    //             return true;
    //         }
    //     }

    // $kn = new ControlerComanda();
    // $kn->adaugaComanda(new ComandaSalut());
    // $kn->adaugaComanda(new ComandaTimp());
    // $kn->executaComanda("salut", "Petru");
    // $kn->executaComanda("timp", null);
?>