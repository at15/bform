<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午7:15
 */

namespace Dy\OAuth\Entity;

use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

class ScopeEntity implements ScopeEntityInterface
{
    use EntityTrait;

    // TODO: why only return the identifier when transformed to JSON
    public function jsonSerialize()
    {
        return $this->getIdentifier();
    }
}
