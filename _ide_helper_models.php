<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Abonne
 *
 * @property $compte CompteAbonne
 * @property int $id
 * @property string $prenom
 * @property string $nom
 * @property int $telephone
 * @property int|null $categorie_abonne_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonnement|null $abonnement
 * @property-read \App\Models\CategorieAbonne|null $typeAbonne
 * @method static \Database\Factories\AbonneFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne query()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereCategorieAbonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonne whereUpdatedAt($value)
 */
	class Abonne extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Abonnement
 *
 * @property int $id
 * @property int $abonne_id
 * @property string $date_expiration
 * @property int $formule_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $paye
 * @property-read \App\Models\Abonne $abonne
 * @property-read \App\Models\Formule|null $formule
 * @method static \Database\Factories\AbonnementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereAbonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereDateExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereFormuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement wherePaye($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Abonnement whereUpdatedAt($value)
 */
	class Abonnement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AchatParution
 *
 * @property int $id
 * @property int $abonne_id
 * @property int $parution_id
 * @property int $prix
 * @property int $commission_journal
 * @property string $methode_paiement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Abonne $abonne
 * @property-read \App\Models\Parution $parution
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution query()
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereAbonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereCommissionJournal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereMethodePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereParutionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AchatParution whereUpdatedAt($value)
 */
	class AchatParution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AppelOffre
 *
 * @property int $id
 * @property string $titre
 * @property string $sous_titre
 * @property string $contenu
 * @property string $publie_dans
 * @property \Illuminate\Support\Carbon $date_limite
 * @property string $domaine
 * @property string|null $cahier
 * @property int $prix_cahier
 * @property string $autorite
 * @property string $adresse_autorite
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereAdresseAutorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereAutorite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereCahier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereDateLimite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereDomaine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre wherePrixCahier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre wherePublieDans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereSousTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppelOffre whereUpdatedAt($value)
 */
	class AppelOffre extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $titre
 * @property string|null $sous_titre
 * @property string|null $contenu
 * @property int $page_id
 * @property string|null $image
 * @property int $compteur
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Theme|null $theme
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCompteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSousTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategorieAbonne
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieAbonne newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieAbonne newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieAbonne query()
 */
	class CategorieAbonne extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompteAbonne
 *
 * @property integer $id
 * @property integer $solde
 * @property Abonne $abonne
 * @property int $abonne_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RechargeCompte[] $recharges
 * @property-read int|null $recharges_count
 * @method static \Database\Factories\CompteAbonneFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne whereAbonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne whereSolde($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompteAbonne whereUpdatedAt($value)
 */
	class CompteAbonne extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ComptePartner
 *
 * @property float $solde
 * @property int $partner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Partner $partner
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner whereSolde($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComptePartner whereUpdatedAt($value)
 */
	class ComptePartner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Formule
 *
 * @property int $id
 * @property int $prix
 * @property string|null $nom
 * @property int|null $duree
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Abonnement[] $abonnements
 * @property-read int|null $abonnements_count
 * @method static \Illuminate\Database\Eloquent\Builder|Formule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formule whereDuree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formule whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formule wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formule whereUpdatedAt($value)
 */
	class Formule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Journal
 *
 * @property int $id
 * @property string $nom
 * @property int $prix
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $prix_net
 * @property int|null $nombre_pages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Parution[] $parutions
 * @property-read int|null $parutions_count
 * @method static \Database\Factories\JournalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereNombrePages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal wherePrixNet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUpdatedAt($value)
 */
	class Journal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Journee
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $date_parutions
 * @property string|null $libelle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Parution[] $parutions
 * @property-read int|null $parutions_count
 * @method static \Database\Factories\JourneeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Journee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Journee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journee whereDateParutions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journee whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journee whereUpdatedAt($value)
 */
	class Journee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $numero
 * @property string $nom
 * @property int $parution_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $compteur
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read mixed $image
 * @property-read \App\Models\Parution $parution
 * @method static \Database\Factories\PageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCompteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereParutionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Partner
 *
 * @property int $id
 * @property string $nom
 * @property string $email
 * @property string $telephone
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $journal_id
 * @property-read \App\Models\ComptePartner|null $comptePartner
 * @property-read \App\Models\Journal $journal
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PartnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereJournalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUserId($value)
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parution
 *
 * @property int $id
 * @property int $journal_id
 * @property int $journee_id
 * @property string $image_la_une
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $publie
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AchatParution[] $achats
 * @property-read int|null $achats_count
 * @property-read \App\Models\Journal $journal
 * @property-read \App\Models\Journee|null $journee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Database\Factories\ParutionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereImageLaUne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereJournalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereJourneeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution wherePublie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parution whereUpdatedAt($value)
 */
	class Parution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RechargeCompte
 *
 * @property int $id
 * @property int $montant
 * @property int $compte_abonne_id
 * @property string|null $methode_paiement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompteAbonne|null $compte
 * @method static \Database\Factories\RechargeCompteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte query()
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereCompteAbonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereMethodePaiement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RechargeCompte whereUpdatedAt($value)
 */
	class RechargeCompte extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Resume
 *
 * @property int $id
 * @property string $titre
 * @property string $contenu
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ResumeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resume whereUpdatedAt($value)
 */
	class Resume extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RetraitComptePartner
 *
 * @property int $id
 * @property int $montant
 * @property int $compte_partner_id
 * @property string $valide_le
 * @property int $valide
 * @property string|null $commentaire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ComptePartner|null $comptePartner
 * @method static \Database\Factories\RetraitComptePartnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner query()
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereComptePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereValide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RetraitComptePartner whereValideLe($value)
 */
	class RetraitComptePartner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Theme
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ThemeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 */
	class Theme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

