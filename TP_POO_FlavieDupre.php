<?php
include_once 'TableauxValeurs.php';
include_once 'FonctionsAleatoires.php';

// *****************  CLASSE MÈRE PERSONNE ***************** //

class Personne{
	protected $_nom;
	protected $_prenom;
	protected $_adresse;
	protected $_age;

	public function __construct($name, $firstname, $adress, $age){ // constructeur avec paramètres
		$this->_nom = $name;
		$this->_prenom = $firstname;
		$this->_adresse = $adress;
		$this->_age = $age;
	} 
		
	public function getInfoPersonne(){
		return "Nom : " . $this->_nom . " <br/> Prénom : " . $this->_prenom . " <br/> Adresse : " . $this->_adresse . " <br/> Âge : " . $this->_age;
		}

	public function getNom(){ // pour obtenir la valeur, lire le champs $_nom
		return $this->_nom;
	}

	public function setNom($nom){ // pour utiliser la valeur, l'écrire ou la modifier
		$this->_nom = $nom; // $this _nom, prend la valeur $nom
	}

	public function getPrenom(){ 
		return $this->_prenom;
	}

	public function setPrenom($prenom){ 
		$this->_prenom = $prenom; 
	}

	public function getAdresse(){ 
		return $this->_adresse;
	}

	public function setAdresse($adresse){ 
		$this->_adresse = $adresse; 
	}

	public function getAge(){ 
		return $this->_age;
	}

	public function setAge($age){ 
		$this->_age = $age; 
	}


	public function __toString(){
		return $this->getInfoPersonne();
	}
}

// ---------  CLASSE FILLE ÉTUDIANT ---------------- //

class Etudiant extends Personne{
	private $_coeffFam;
	private $_fraisInscription;
	private $_UFRinscription;
	private $_ville;
	private $_identifiant; // un champs auto-calculé
	private static $_id = 0 ;

	public function __construct(Personne $student, $coF, $frais, $ufr, $town){  // constructeur avec paramètres
		parent::__construct($student->getPrenom(), $student->getNom(), $student->getAdresse(), $student->getAge());
		$this->_coeffFam = $coF;
		$this->_fraisInscription = $frais;
		$this->_UFRinscription = $ufr;
		$this->_ville = $town;
		$this->_identifiant = ++self::$_id; // on met le ++ devant pour qu'il incrémente puis l'affecte à $_identifiant
	}

	public function __toString(){
		return parent::getInfoPersonne(). " <br/> Coefficient familiale : " . $this->_coeffFam . " <br/> Frais d'inscription : " . $this->_fraisInscription . " <br/> UFR : " . $this->_UFRinscription . " <br/> Ville : " . $this->_ville .  " <br/> Identifiant : " . $this->_identifiant ;
	}
	
}

// ---------  CLASSE FILLE PROFESSEUR ---------------- //

class Professeur extends Personne{
	private $_salaire;
	private $_UFRinscrit;
	private $_ville;
	private $_identifiant; // un champs auto-calculé
	private static $_id = 0 ;

	public function __construct(Personne $prof, $salary, $ufrI, $town){  // constructeur avec paramètres
		parent::__construct($prof->getPrenom(), $prof->getNom(), $prof->getAdresse(), $prof->getAge());
		$this->_salaire = $salary;
		$this->_UFRinscrit = $ufrI;
		$this->_ville = $town;
		$this->_identifiant = ++self::$_id; // on met le ++ devant pour qu'il incrémente puis l'affecte à $_identifiant

	}

	public function __toString(){
		return parent::getInfoPersonne(). " <br/> Salaire : " . $this->_salaire . " <br/> UFR : " . $this->_UFRinscrit . " <br/> Ville : " . $this->_ville .  " <br/> Identifiant : " . $this->_identifiant ;
	}
	
}

// ---------  CLASSE COURS ---------------- //
class Cours{
	private $_theme;
	private $_UFR;

	public function __construct($theme, $ufr){
		$this->_theme = $theme;
		$this->_UFR = $ufr;
	}

	public function getInfoCours(){
		return "Thème : " . $this->_theme . " <br/> UFR : " . $this->_UFR;
	}

	public function getTheme(){
		return $this->_theme ;
	}

	public function getUfr(){
		return $this->_UFR ;
	}

	public function setTheme($theme){ 
		$this->_theme = $theme; 
	}

	public function setUfr($ufr){ 
		$this->_UFR = $ufr; 
	}

	public function __toString(){
		return $this->getInfoCours();
	}
}

// ---------  UTILISATION DES OBJETS ---------------- //
$etudient1 = new Etudiant(new Personne("Dupré", "Flavie", "Nantes", 21), 518, 50, "Médecine", "Rennes");
$professeur1 = new Professeur(new Personne("Grapin", "Emmy", "St Nazaire", 32), 2500, "Droit", "St Nazaire");
$cours1 = new Cours("LNG","Nantes");

// ---------  MES AFFICHAGES ---------------- //
echo $etudient1 . "<br/>";
echo "<br/>";
echo $professeur1 . "<br/>";
echo "<br/>";
echo $cours1 . "<br/>";































?>
