<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace FluxoCaixa\Model;

use Base\Model\AbstractTable;
use Zend\Db\TableGateway\TableGateway;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsContasReceberTable extends AbstractTable {

    /**
     * construct do Table
     *
     * @return Base\Model\AbstractTable
     */
    public function __construct(TableGateway $tableGateway) {
        // Configurações iniciais do TableModel
        $this->tableGateway = $tableGateway;
        $this->joins = [
            ['tabela' => "bs_planos_contas", 'w' => "bs_contas_receber.plano_conta_id=bs_planos_contas.id", 'c' => ['title_bs_planos_contas' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_contas", 'w' => "bs_contas_receber.conta_id=bs_contas.id", 'c' => ['title_bs_contas' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_users", 'w' => "bs_contas_receber.cliente_id=bs_users.id", 'c' => ['title_bs_cliente' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_centro_custo", 'w' => "bs_contas_receber.centro_custo_id=bs_centro_custo.id", 'c' => ['title_bs_centro_custo' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_tipo_documento", 'w' => "bs_contas_receber.tipo_documento=bs_tipo_documento.id", 'c' => ['title_bs_tipo_documento' => 'title'], 'predicate' => 'left'],
            ['tabela'=>"bs_caixa",'w'=>"bs_contas_receber.caixa_id=bs_caixa.id",'c'=> ['title_bs_caixa' => 'title'],'predicate'=> 'left'],
            ['tabela' => "bs_conta_situacao", 'w' => "bs_contas_receber.situacao=bs_conta_situacao.alias", 'c' => ['title_bs_conta_situacao' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_conta_repete", 'w' => "bs_contas_receber.repete=bs_conta_repete.alias", 'c' => ['title_bs_conta_repete' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_conta_periodos", 'w' => "bs_contas_receber.periodos=bs_conta_periodos.id", 'c' => ['title_bs_conta_periodos' => 'title'], 'predicate' => 'left'],
        ];
        $this->extraWere=[['bs_conta_situacao.tipo'=>'ET']];
    }

    public function insert(\Base\Model\AbstractModel $data) {
        if ($data->getQtdade() > 1 && $data->getSituacao()):
            $date = $data->getPublishUp();
            $data->setPublishUp(date("Y-m-d 00:00:00", strtotime($date)));
            $qtdVezes = $data->getQtdade();
            $periodo_alias = "+1 month";
            $periodo_title="Mensal";
            $periodo = $this->getSqlPerson('bs_conta_periodos', array('id' => $data->getPeriodos()));
            if ($periodo):
                $periodo_alias = $periodo['alias'];
                $periodo_title=$periodo['title'];
            endif;
            for ($index = 1; $index <= $qtdVezes; $index++) {
                $date = $data->getPublishUp();
                if ($date != date("Y-m-d 00:00:00")) {//se a data for diferente de hoje
                    $data->setCaixaId(0);
                    $data->setState('1');
                    $data->setSituacao('1');
                } else {
                    $data->setSituacao('0');
                }
                $data->setQtdade($index);
                parent::insert($data);
                $new_date = strtotime(date("Y-m-d 00:00:00", strtotime($date)) . " {$periodo_alias}");
                $data->setPublishUp(date("Y-m-d 00:00:00", $new_date));
                $parcela = str_pad($index, 2, '0', STR_PAD_LEFT);
                if($this->getResult()):
                    $this->error = "{$parcela} DESPESAS FORAM ADIDIONADAS COM SUCESSO, PERILDO {$periodo_title}";
                endif;
                
            }
        else:
            parent::insert($data);
        endif;
        return $this->result;
    }

    public function update(\Base\Model\AbstractModel $data) {
        if (!$data->getSituacao()):
            $caixa = $this->getSqlPerson('bs_caixa', array('state' => 0, 'created' => date("Y-m-d")));
            if ($caixa):
                $data->setCaixaId($caixa['id']);
                $data->setState(0);
            endif;
        endif;
        parent::update($data);
        return $this->result;
    }

}
