<?php

namespace Grp2021\app;
interface IUserRepository {
  public function saveUser(user $user): bool;
  public function findUserByEmail(string $email): ?user;
  public function findIfAdmin(string $email): bool;
}