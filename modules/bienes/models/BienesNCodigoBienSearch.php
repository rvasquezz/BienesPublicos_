<?php

namespace app\modules\bienes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bienes\models\BienesNCodigoBien;

/**
 * BienesNCodigoBienSearch represents the model behind the search form about `app\modules\bienes\models\BienesNCodigoBien`.
 */
class BienesNCodigoBienSearch extends BienesNCodigoBien
{
  //  public $localidad;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'id_localidad', 'identificacion'], 'integer'],
            [['nombre', 'descripcion', 'ano_adquisicion', 'ubicacion', 'tipo_adquisicion', 'n_documento'], 'safe'],
            [['valor_unidad', 'justiprecio'], 'number'],
          //  [['localidad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BienesNCodigoBien::find();


      //  $query->joinWith(['localidad']);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


      /*  $dataProvider->sort->attributes['localidad'] = [
        'asc' => ['BienesLocalidad.nombre' => SORT_ASC],
        'desc' => ['BienesLocalidad.nombre' => SORT_DESC],
    ];


*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([

            'id_codigo' => $this->id_codigo,
            'id_localidad' => $this->id_localidad,
          //  'id_localidad' => $this->id_localidad,
            'identificacion' => $this->identificacion,
            'valor_unidad' => $this->valor_unidad,
            'justiprecio' => $this->justiprecio,
            'ano_adquisicion' => $this->ano_adquisicion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'ubicacion', $this->ubicacion])
            ->andFilterWhere(['like', 'tipo_adquisicion', $this->tipo_adquisicion])
            ->andFilterWhere(['like', 'n_documento', $this->n_documento]);
          //  ->andFilterWhere(['like', 'BienesLocalidad.id_localidad', $this->nombre])

        return $dataProvider;
    }
}