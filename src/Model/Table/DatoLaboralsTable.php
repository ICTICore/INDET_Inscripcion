<?php
namespace App\Model\Table;

use App\Model\Entity\DatoLaboral;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DatoLaborals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Estados
 * @property \Cake\ORM\Association\BelongsTo $Municipios
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class DatoLaboralsTable extends Table
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

        $this->table('dato_laborals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Municipios', [
            'foreignKey' => 'municipio_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'dato_laboral_id'
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
            ->requirePresence('empresa', 'create')
            ->notEmpty('empresa');

        $validator
            ->allowEmpty('rfc');

        $validator
            ->requirePresence('sector', 'create')
            ->notEmpty('sector');

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
            ->requirePresence('num_ext', 'create')
            ->notEmpty('num_ext');

        $validator
            ->requirePresence('num_int', 'create')
            ->notEmpty('num_int');

        $validator
            ->requirePresence('calle', 'create')
            ->notEmpty('calle');

        $validator
            ->requirePresence('localidad', 'create')
            ->notEmpty('localidad');

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
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        $rules->add($rules->existsIn(['municipio_id'], 'Municipios'));
        return $rules;
    }
}
