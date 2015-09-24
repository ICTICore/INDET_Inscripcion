<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DatoPersonal Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $rfc
 * @property string $nombre
 * @property string $a_paterno
 * @property string $a_materno
 * @property string $genero
 * @property string $telefono_1
 * @property string $telefono_2
 * @property \Cake\I18n\Time $fecha_nacimiento
 * @property string $email
 * @property string $codigo_postal
 * @property string $estado
 * @property string $municipio
 * @property string $calle
 * @property string $num_ext
 * @property string $num_int
 * @property string $localidad
 * @property string $ayudas
 * @property string $tipo_sanguineo
 * @property string $alergias
 * @property string $institucion_seguridad
 * @property string $numero_afiliacion
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $fotografia
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class DatoPersonal extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
