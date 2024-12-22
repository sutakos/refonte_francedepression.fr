<?php
namespace Grp202_1\php;
class enregistrementUser {

    public function __construct(private IUserRepository $userRepository) { }

    /**
     * @throws enregistrementException
     */
    public function enregistrer(string $email, string $age, string $sexe, bool $triste) : bool {
        if(findUserByEmail($email))
            throw new enregistrementException("Vous avez déjà répondu au formulaire","warning");
        $user = new User($email, $age, $sexe, $triste);
        return $this->userRepository->saveUser($user);
    }

    /**
     * @throws enregistrementException
     */
    public function authenticate(string $email, string $password) : string {
        // TODO : À compléter
    }

}