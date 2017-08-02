<?php

namespace JPFichePaieBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JPFichePaieBundle extends Bundle
{
	public function getParent()

  {

    return 'FOSUserBundle';

  }
}
