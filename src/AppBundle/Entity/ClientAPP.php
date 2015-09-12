<?php
/*
 src/AppBundle/Entity/ClientAPP.php

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace AppBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

/**
 * @author Przemyslaw Zygmunt p.zygmunt@acsoftware.pl [AC SOFTWARE]
 * @ORM\Entity
 * @ORM\Table(name="supla_client", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_CLIENTAPP", columns={"id","guid"})})
 * @UniqueEntity(fields="id", message="ClientAPP already exists")
 */
class ClientAPP
{    
	/**
	 * @ORM\Id
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
    /**
     * @ORM\Column(name="guid", type="binary", length=16, nullable=false, unique=false)
     */
    protected $guid;

    /**
     * @ORM\ManyToOne(targetEntity="AccessID", inversedBy="clientApps")
     * @ORM\JoinColumn(name="access_id", referencedColumnName="id", nullable=false)
     */
    protected $accessId;
    
    /**
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    protected $name;
    
    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    protected $enabled;
    
    /**
     * @ORM\Column(name="reg_ipv4", type="integer", options={"unsigned"=true})
     */
    protected $regIpv4;
    
    /**
     * @ORM\Column(name="reg_date", type="datetime")
     */
    protected $regDate;
    
    /**
     * @ORM\Column(name="last_access_ipv4", type="integer", options={"unsigned"=true})
     */
    protected $lastAccessIpv4;
    
    /**
     * @ORM\Column(name="last_access_date", type="datetime")
     */
    protected $lastAccessDate;
    
    /**
     * @ORM\Column(name="software_version", type="string", length=10, nullable=false)
     */
    protected $softwareVersion;
    
    /**
     * @ORM\Column(name="protocol_version", type="integer", nullable=false)
     */
    protected $protocolVersion;
    
}