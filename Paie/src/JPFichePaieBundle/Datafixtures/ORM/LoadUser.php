<?php


namespace JPFichePaieBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use JPFichePaieBundle\Entity\User;

class LoadUser implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $listNames = array('Alexandre@first.ci', 'Marine@second.com', 'Anna@third.com');

    foreach ($listNames as $name) {
      // On crée l'utilisateur
      $user = new User;

      // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
      $user->setMail($name);
      
      $user->setPassword($name);

      $user->setTypeuser(1);

      $user->setCompagny(1);

       $user->setContact('+22543513076');
      // On ne se sert pas du sel pour l'instant
      $user->setSalt('');
      // On définit uniquement le role ROLE_USER qui est le role de base
      $user->setRoles(array('ROLE_USER'));

      // On le persiste
      $manager->persist($user);
    }

    // On déclenche l'enregistrement
    $manager->flush();
  }
}