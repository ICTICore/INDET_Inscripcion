<?php
namespace App\Model\Table;

use App\Model\Entity\DatoSindical;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DatoSindicals Model
 *
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class DatoSindicalsTable extends Table
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

        $this->table('dato_sindicals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Usuarios', [
            'foreignKey' => 'dato_sindical_id'
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
            ->requirePresence('siglas', 'create')
            ->notEmpty('siglas')
            ->add('siglas', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('sindicato', 'create')
            ->notEmpty('sindicato');

        $validator
            ->allowEmpty('rfc');

        $validator
            ->allowEmpty('sector');

        $validator
            ->allowEmpty('representante');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        $validator
            ->allowEmpty('sucursal');

        $validator
            ->allowEmpty('codigo_postal');

        $validator
            ->allowEmpty('estado');

        $validator
            ->allowEmpty('municipio');

        $validator
            ->allowEmpty('num_ext');

        $validator
            ->allowEmpty('num_int');

        $validator
            ->allowEmpty('calle');

        $validator
            ->allowEmpty('localidad');

        $validator
            ->allowEmpty('telefono_1');

        $validator
            ->allowEmpty('telefono_2');

        $validator
            ->allowEmpty('fotografia_logo');

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
