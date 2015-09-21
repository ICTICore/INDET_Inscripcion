<?php
namespace App\Model\Table;

use App\Model\Entity\DatoPersonal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DatoPersonals Model
 *
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class DatoPersonalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('dato_personals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Usuarios', [
            'foreignKey' => 'dato_personal_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('rfc', 'create')
            ->notEmpty('rfc')
            ->add('rfc', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('a_paterno', 'create')
            ->notEmpty('a_paterno');

        $validator
            ->requirePresence('a_materno', 'create')
            ->notEmpty('a_materno');

        $validator
            ->allowEmpty('genero');

        $validator
            ->allowEmpty('telefono_1');

        $validator
            ->allowEmpty('telefono_2');

        $validator
            ->add('fecha_nacimiento', 'valid', ['rule' => 'date'])
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('codigo_postal');

        $validator
            ->allowEmpty('estado');

        $validator
            ->allowEmpty('municipio');

        $validator
            ->allowEmpty('calle');

        $validator
            ->allowEmpty('num_ext');

        $validator
            ->allowEmpty('num_int');

        $validator
            ->allowEmpty('localidad');

        $validator
            ->allowEmpty('ayudas');

        $validator
            ->allowEmpty('tipo_sanguineo');

        $validator
            ->allowEmpty('alergias');

        $validator
            ->allowEmpty('institucion_seguridad');

        $validator
            ->allowEmpty('numero_afiliacion');

        $validator
            ->allowEmpty('fotografia');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
