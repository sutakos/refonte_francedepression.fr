<?php
namespace Grp2021\app;
use Grp2021\app\Exceptions\AuthentificationException;
use Grp2021\app\Exceptions\FormulaireException;

class enregistrementForm {

    private IFormRepository $formRepository;

    public function __construct(IFormRepository $formRepository) {
        $this->formRepository = $formRepository;
    }

    /**
     * @throws FormulaireException
     */
    public function enregistrement(int $id,string $statut,int $age,string $sexe,string $region,bool $triste,string $frequence,string $amelioration) : bool {
        try {
            // Vérifier si l'utilisateur a déjà répondu
            if ($this->formRepository->findFormByID($id) !== null) {
                throw new FormulaireException("Vous avez déjà répondu au formulaire.", "warning");
            }
            $this->formRepository->saveForm(new formulaire($id,$statut,$age,$sexe,$region,$triste,$frequence,$amelioration));
            return true;
        }
        catch (AuthentificationException $e) {
            Messages::goTo($e->getMessage(),$e->getType(),"index.php");
        }
        return false;

    }

}