<?php

namespace Grp202_1\php;
interface IUserRepository {
  public function saveUser(user $user): bool;
  public function findUserByEmail(string $email): ?user;
}