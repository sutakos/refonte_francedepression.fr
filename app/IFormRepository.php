<?php

namespace Grp2021\app;
interface IFormRepository {
  public function saveForm(formulaire $form): bool;
  public function findFormByID(int $id): ?formulaire;
}