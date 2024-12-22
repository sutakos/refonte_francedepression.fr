<?php

namespace Grp202_1\php;
interface IUserRepository {
  public function saveUser(user $user): bool;
  public function UserExist(string $email): bool;
}