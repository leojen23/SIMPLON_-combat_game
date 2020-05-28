<?php


class Guerrier extends Personnage
{
    protected $type;


    public function frapper(Personnage $perso)
    {
    if($perso->id() == $this->id)
      {
        return self::CEST_MOI;
      }
      // $force = $this->strength();
      $this->experience += 25;
      $attaquant = $this->type();
      $forceAttaquant = $this->strength();
      // On indique au personnage qu'il doit recevoir des dégâts.
      // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
      return $perso->recevoirDegats($attaquant, $forceAttaquant);

    }

    public function recevoirDegats($attaquant, $forceAttaquant)
  {
    if($attaquant === 'archer'){
      $this->degats  += 10 + $forceAttaquant;
    }
    else{
      $this->degats += 5;
    }
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if($this->degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }

   

    public function type()
  {
    return $this->type;
  }

  public function setType($type)
  {
    
    $this->type = $type;
  }

}