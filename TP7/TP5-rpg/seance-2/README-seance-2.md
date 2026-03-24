# TP5 — Constructeur et Encapsulation
**Séance 2 | BTS SIO – Bloc 2**

**Durée :** 1h30
**Notions abordées :** `__construct()`, paramètres obligatoires/optionnels, validation, `private`, getters, setters, propriétés calculées

> ⚠️ **Prérequis :** avoir réalisé la séance 1 (classes `Personnage`, `Inventaire`, `Guilde`). Les exercices 2 et 3 prolongent directement ce travail.

---

## Rappel express — ce qui change en séance 2

| Séance 1                                   | Séance 2                                       |
| ------------------------------------------ | ---------------------------------------------- |
| `public $nom;` puis `$p->nom = "Gandalf";` | `__construct("Gandalf", ...)`                  |
| N'importe qui modifie n'importe quoi       | `private` + getters/setters                    |
| Pas de validation                          | Validation dans le constructeur et les setters |

---

## Avant de commencer : modéliser avant de coder

Pour chaque exercice, posez-vous les deux questions habituelles **plus une nouvelle** :

- Quelles sont les **propriétés** ? *(ce qu'il sait)*
- Quelles sont les **méthodes** ? *(ce qu'il peut faire)*
- Quelles propriétés méritent d'être **protégées** (`private`) ? *(ce qu'on ne veut pas laisser modifier librement)*

---

## Exercice 1 — Classe `Sort` avec constructeur *(25 min)*

### Contexte

Votre équipe ajoute un système de sorts au jeu. Chaque sort a un nom, un élément, une puissance et un coût en mana. Un sort mal configuré (puissance négative, nom vide) ne doit pas pouvoir exister.

### Modélisation attendue

| Propriétés | Visibilité | Méthodes |
|---|---|---|
| ? | ? | ? |
| ? | ? | ? |
| ? | ? | ? |

### Consignes

Créez un fichier `sort.php`.

**1. La classe**

Créez une classe `Sort` avec les propriétés **publiques** suivantes (l'encapsulation arrive à l'exercice 3) :

- `nom` — le nom du sort (ex : `"Boule de Feu"`)
- `element` — l'élément du sort (`"Feu"`, `"Glace"`, `"Foudre"`, `"Ombre"`)
- `degatsBase` — les dégâts infligés (entier positif)
- `coutMana` — le coût en mana pour lancer le sort (entier, défaut : 10)

**2. Le constructeur**

Écrivez un constructeur `__construct($nom, $element, $degatsBase, $coutMana = 10)` qui :

- Vérifie que `$nom` n'est pas vide → exception si invalide
- Vérifie que `$degatsBase` est strictement positif → exception si invalide
- Vérifie que `$coutMana` est supérieur ou égal à 0 → exception si invalide
- Initialise toutes les propriétés

**3. Les méthodes**

- `decrire()` — retourne une présentation complète du sort.  
  *Exemple :* `"[Feu] Boule de Feu — 50 dégâts — Coût : 25 mana"`

- `estAbordable($manaDisponible)` — retourne `true` si le mana disponible est suffisant pour lancer le sort.

- `calculerDegatsRels($niveau)` — retourne les dégâts réels en tenant compte du niveau du lanceur : `degatsBase + (niveau × 5)`.

**4. Les tests**

Créez **3 sorts** valides et testez toutes les méthodes. Tentez également de créer **2 sorts invalides** (nom vide, dégâts négatifs) et gérez les exceptions avec `try/catch`.

### Critères de réussite

- [ ] Les deux paramètres obligatoires le sont vraiment (erreur si omis)
- [ ] `coutMana` est bien optionnel avec la valeur par défaut 10
- [ ] Les exceptions sont levées pour les données invalides
- [ ] `try/catch` est utilisé autour des créations potentiellement invalides

### Bonus

Ajoutez une méthode `améliorerSort($points)` qui augmente les `degatsBase` du sort d'un nombre de points donné, avec validation (points > 0).

---

## Exercice 2 — Refactoring de `Personnage` *(20 min)*

### Contexte

La classe `Personnage` de la séance 1 fonctionne, mais elle est fragile : on peut lui assigner des PV négatifs, un niveau à zéro ou un nom vide. On va la renforcer avec un constructeur et la garder en `public` pour l'instant.

### Consignes

Reprenez votre fichier `personnage.php` de la séance 1.

**1. Ajoutez un constructeur**

```php
public function __construct($nom, $classe, $niveau = 1, $pvMax = 100)
```

- `$nom` et `$classe` sont obligatoires
- `$niveau` (défaut 1) et `$pvMax` (défaut 100) sont optionnels
- Validations : nom non vide, niveau ≥ 1, pvMax > 0
- Le personnage démarre avec tous ses PV (`pointsDeVie = pointsDeVieMax`)

**2. Adaptez vos tests**

Remplacez les 5 lignes d'initialisation de la séance 1 par une seule ligne avec `new`. Vérifiez que toutes vos méthodes (`sePresenter`, `soigner`, `monterDeNiveau`, etc.) fonctionnent toujours.

**3. Testez les cas d'erreur**

- Tentez de créer un personnage avec un nom vide → doit lever une exception
- Tentez de créer un personnage avec un niveau à 0 → doit lever une exception

### Critères de réussite

- [ ] La création en une ligne fonctionne : `new Personnage("Aragorn", "Guerrier", 8, 150)`
- [ ] Les méthodes de la séance 1 fonctionnent toujours
- [ ] Les cas invalides lèvent bien des exceptions
- [ ] `try/catch` utilisé dans les tests

### Bonus

Faites la même chose pour la classe `Inventaire` : ajoutez un constructeur `__construct($proprietaire, $emplacementsMax = 10)`.

---

## Exercice 3 — Encapsulation de `Guilde` *(45 min)*

### Contexte

La classe `Guilde` du mini-projet séance 1 fonctionne, mais ses données sont exposées. On va la refactoriser avec `private`, des getters, des setters validants et des propriétés calculées.

### Modélisation attendue

Avant de commencer, complétez ce tableau pour la nouvelle version de `Guilde` :

| Propriété | Visibilité | Getter ? | Setter ? | Calculée ? |
|---|---|---|---|---|
| `nom` | ? | ? | ? | |
| `reputation` | ? | ? | ? (avec validation) | |
| `membresMax` | ? | ? | | |
| `membres` | ? | ? | | |
| Nombre de membres | | | | ? |
| Guilde complète ? | | | | ? |
| Niveau moyen | | | | ? |

### Consignes

Reprenez votre fichier `Guilde.php` du mini-projet séance 1.

**1. Constructeur**

Ajoutez un constructeur `__construct($nom, $membresMax = 5, $reputation = 0)` :

- `$nom` est obligatoire et ne peut pas être vide
- `$membresMax` est optionnel (défaut 5), doit être ≥ 1
- `$reputation` est optionnel (défaut 0), doit être entre 0 et 100

**2. Passer les propriétés en `private`**

Déclarez `$nom`, `$reputation`, `$membresMax` et `$membres` en `private`.

**3. Getters**

Ajoutez les getters suivants :

- `getNom()` — retourne le nom de la guilde
- `getReputation()` — retourne la réputation
- `getMembresMax()` — retourne le nombre maximum de membres
- `getMembers()` — retourne le tableau des membres

**4. Setter avec validation**

- `setReputation($reputation)` — valide que la valeur est entre 0 et 100 avant d'assigner.  
  Lance une exception si la valeur est hors bornes.

**5. Propriétés calculées**

- `getNombreMembres()` — retourne `count($this->membres)`
- `estComplete()` — retourne `true` si la guilde est pleine
- `getNiveauMoyen()` — retourne le niveau moyen des membres (0 si vide). Utilisez `getNiveau()` sur chaque membre.

**6. Adapter les méthodes existantes**

Mettez à jour `recruter()`, `expulser()`, `afficherMembres()` et `gagnerReputation()` pour utiliser le setter `setReputation()` plutôt que de modifier `$reputation` directement.

**7. Adapter `TestGuilde.php`**

Mettez à jour votre fichier de test :
- Remplacez les 4 lignes d'initialisation par le constructeur
- Remplacez les accès directs aux propriétés (`$guilde->reputation`) par les getters
- Ajoutez un test du setter invalide (`setReputation(150)` → exception)

### Critères de réussite

- [ ] La guilde se crée en une ligne avec le constructeur
- [ ] Accéder à `$guilde->nom` depuis l'extérieur lève une erreur (private)
- [ ] `getNom()`, `getReputation()`, etc. fonctionnent
- [ ] `setReputation(150)` lève une exception
- [ ] Les propriétés calculées retournent les bonnes valeurs
- [ ] `TestGuilde.php` est mis à jour et fonctionne

---

## Critères d'évaluation globaux

| Critère | Points |
|---|---|
| Constructeur correct (paramètres, deux underscores, pas de `return`) | /4 |
| Validation dans le constructeur et les setters | /4 |
| `private` utilisé correctement, getters fonctionnels | /4 |
| Propriétés calculées retournant les bonnes valeurs | /4 |
| Gestion des exceptions (`throw` + `try/catch`) | /2 |
| Lisibilité, conventions de nommage, commentaires | /2 |
| **Total** | **/20** |

---

## Rappel — Syntaxe de la séance 2

```php
class NomClasse {

    private $propriete;

    // Constructeur
    public function __construct($param, $optionnel = "défaut") {
        if (empty($param)) {
            throw new Exception("Message d'erreur.");
        }
        $this->propriete = $param;
    }

    // Getter
    public function getPropriete() {
        return $this->propriete;
    }

    // Setter avec validation
    public function setPropriete($valeur) {
        if ($valeur < 0) {
            throw new Exception("Valeur invalide.");
        }
        $this->propriete = $valeur;
    }

    // Propriété calculée
    public function getValeurCalculee() {
        return $this->propriete * 2; // Calculée à la demande, non stockée
    }
}

// Utilisation
try {
    $obj = new NomClasse("test");
    echo $obj->getPropriete();
    $obj->setPropriete(10);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
```

> 💡 Si vous bloquez sur la syntaxe, reportez-vous au support de cours. Si vous bloquez sur la logique, levez la main.
