<?php

abstract class Personnage
{
    protected string $nom;
    private string $classe;

    protected int $niveau;
    protected int $pointsDeVie;
    protected int $pointsDeVieMax;

    public function __construct($nom, $classe, $niveau = 1, $pvMax = 100) {
        if (empty(trim($nom))) {
            throw new Exception("Le nom du personnage ne peut pas être vide.");
        }
        if ($niveau < 1) {
            throw new Exception("Le niveau doit être au moins 1.");
        }
        if ($pvMax <= 0) {
            throw new Exception("Les PV max doivent être positifs.");
        }
        $this->nom            = trim($nom);
        $this->classe         = $classe;
        $this->niveau         = $niveau;
        $this->pointsDeVieMax = $pvMax;
        $this->pointsDeVie    = $pvMax;
    }

    // Getters
    public function getNom()            { return $this->nom;            }
    public function getClasse()         { return $this->classe;         }
    public function getNiveau()         { return $this->niveau;         }
    public function getPointsDeVie()    { return $this->pointsDeVie;    }
    public function getPointsDeVieMax() { return $this->pointsDeVieMax; }

    // Setter avec plafonnement
    public function setPointsDeVie($pv) {
        $this->pointsDeVie = max(0, min((int) $pv, $this->pointsDeVieMax));
    }

    // Propriétés calculées
    public function estEnVie()   { return $this->pointsDeVie > 0;                          }
    public function estBlesse()  { return $this->pointsDeVie < $this->pointsDeVieMax;      }
    public function estEligible(){ return $this->niveau >= 5;                              }

    // Méthodes métier
    public function sePresenter() {
        return "[" . $this->getSpecialite() . "] " . $this->nom
            . " — Niveau " . $this->niveau
            . " — PV : " . $this->pointsDeVie . "/" . $this->pointsDeVieMax;
    }

    public function seSoigner($points) {
        if ($points <= 0) return "Erreur : points de soin invalides.";
        $pvAvant = $this->pointsDeVie;
        $this->setPointsDeVie($this->pointsDeVie + $points);
        return $this->nom . " récupère " . ($this->pointsDeVie - $pvAvant) . " PV.";
    }

    public function recevoirDegats($degats) {
        if ($degats <= 0) return "Erreur : dégâts invalides.";
        $this->setPointsDeVie($this->pointsDeVie - $degats);
        if (!$this->estEnVie()) return $this->nom . " est hors combat !";
        return $this->nom . " reçoit " . $degats . " dégâts. PV : "
            . $this->pointsDeVie . "/" . $this->pointsDeVieMax;
    }

    public function monterDeNiveau() {
        $this->niveau++;
        $this->pointsDeVieMax += 20;
        $this->setPointsDeVie($this->pointsDeVieMax);
        return "🎉 " . $this->nom . " passe au niveau " . $this->niveau . " !";
    }

//    public function calculerDegats()
//    {
//        return 5;
//    }
//    public function attaquer()
//    {
//        return $this->nom . " attaque ! Dégats : " . $this->calculerDegats();
//    }

    abstract function calculerDegats();
    abstract function attaquer();

    abstract function getSpecialite();

}