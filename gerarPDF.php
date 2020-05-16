<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("conexao.php");
include("./MPDF57/mpdf.php");
$grupo = selectAllPessoa();
$mpdf = new mPDF();
$mpdf->SetDisplayMode("fullpage");
$mpdf->WriteHTML("<h1>Relátorio de dados Agenda</h1><hr/>");

$html = "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>";
                    foreach ($grupo as $pessoa) {
                
                $html = $html ."    <tr>
                    <td>{$pessoa["id"]}</td>
                    <td>{$pessoa["nome"]}</td>
                    <td>".formatoData($pessoa["nascimento"])."</td>
                    <td>{$pessoa["telefone"]}</td>
                    <td>{$pessoa["endereco"]}</td>
                     </tr>";
                 }
               
          $html = $html ."  </tbody>
        </table>";
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();

