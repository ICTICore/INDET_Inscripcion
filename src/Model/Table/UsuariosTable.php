<?php
namespace App\Model\Table;

use App\Model\Entity\Usuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $DatoPersonals
 * @property \Cake\ORM\Association\BelongsTo $DatoSindicals
 * @property \Cake\ORM\Association\BelongsTo $DatoLaborals
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class UsuariosTable extends Table
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

        $this->table('usuarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DatoPersonals', [
            'foreignKey' => 'dato_personal_id'
        ]);
        $this->belongsTo('DatoSindicals', [
            'foreignKey' => 'dato_sindical_id'
        ]);
        $this->belongsTo('DatoLaborals', [
            'foreignKey' => 'dato_laboral_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('curp', 'create')
            ->notEmpty('curp')
            ->add('curp', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->existsIn(['dato_personal_id'], 'DatoPersonals'));
        $rules->add($rules->existsIn(['dato_sindical_id'], 'DatoSindicals'));
        $rules->add($rules->existsIn(['dato_laboral_id'], 'DatoLaborals'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
