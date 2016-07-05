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
class BsContasPagarTable extends AbstractTable {

    /**
     * construct do Table
     *
     * @return Base\Model\AbstractTable
     */
    public function __construct(TableGateway $tableGateway) {
        // Configurações iniciais do TableModel
        $this->tableGateway = $tableGateway;
        $this->joins = [
            ['tabela' => "bs_planos_contas", 'w' => "bs_contas_pagar.plano_conta_id=bs_planos_contas.id", 'c' => ['title_bs_planos_contas' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_contas", 'w' => "bs_contas_pagar.conta_id=bs_contas.id", 'c' => ['title_bs_contas' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_fornecedores", 'w' => "bs_contas_pagar.fornecedor_id=bs_fornecedores.id", 'c' => ['title_bs_fornecedor' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_centro_custo", 'w' => "bs_contas_pagar.centro_custo_id=bs_centro_custo.id", 'c' => ['title_bs_centro_custo' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_tipo_documento", 'w' => "bs_contas_pagar.tipo_documento=bs_tipo_documento.id", 'c' => ['title_bs_tipo_documento' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_caixa", 'w' => "bs_contas_pagar.caixa_id=bs_caixa.id", 'c' => ['caixa_title' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_tipo_custo", 'w' => "bs_contas_pagar.tipo_custo=bs_tipo_custo.id", 'c' => ['title_bs_tipo_custo' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_apropriacao_custo", 'w' => "bs_contas_pagar.apropriacao_custo=bs_apropriacao_custo.id", 'c' => ['title_bs_apropriacao_custo' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_conta_situacao", 'w' => "bs_contas_pagar.situacao=bs_conta_situacao.id", 'c' => ['title_bs_conta_situacao' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_conta_repete", 'w' => "bs_contas_pagar.repete=bs_conta_repete.alias", 'c' => ['title_bs_conta_repete' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_conta_periodos", 'w' => "bs_contas_pagar.periodos=bs_conta_periodos.id", 'c' => ['title_bs_conta_periodos' => 'title'], 'predicate' => 'left'],
        ];
    }

    public function insert(\Base\Model\AbstractModel $data) {
        if ($data->getQtdade() > 1 && $data->getSituacao()):
            $date = $data->getPublishUp();
            $data->setPublishUp(date("Y-m-d 00:00:00", strtotime($date)));
            for ($index = 1; $index <= $data->getQtdade(); $index++) {
                if ($date != date("Y-m-d 00:00:00")) {
                    $data->setCaixaId(0);
                }
                parent::insert($data);
                $interval = $data->getPerildo();
                $new_date = strtotime(date("Y-m-d 00:00:00", strtotime($date)) . " {$interval}");
                $data->setPublishUp(date("Y-m-d 00:00:00", $new_date));
                $parcela = str_pad($index, 2, '0', STR_PAD_LEFT);
                $perildo = ['+1 days' => "DIARIO", '+7 days' => "SEMANAL", '+15 days' => "QUINSENAL", '+1 month' => "MENSAL", '+6 month' => "SEMESTRAL", '+12 month' => "ANUAL"];
                $this->error = "{$parcela} DESPESAS FORAM ADIDIONADAS COM SUCESSO, PERILDO {$perildo[$interval]}";
                $date = $data->getPublishUp();
            }
        else:
            parent::insert($data);
        endif;
        return $this->result;
    }

}
