    <?php
    // inicia o buffer de saída para capturar qualquer conteúdo
    ob_start();
    //inclui o autoload do composer (caso use dependencia instaladas por ele)
    require_once(__DIR__ . '/fpdf/fpdf.php');

    //cria uma nova instância da classe FPDF
    $pdf = new FPDF("P","pt","A4");
    //adiciona uma nova página ao documento pdf
    $pdf->AddPage();
    // Função auxiliar para converter textos para ISO-8859-1(evitar problemas com acentuação)
    function textoPDF($txt) {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
    }
    //define a fonte do texto
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(0, 10, textoPDF('Relatório de dados'), 0, 1, 'C');
    $pdf->SetFont('Arial','',10 );
    $pdf->Cell(0, 20, textoPDF('Pamella Rafaeli Neves'), 0, 1, 'C');


    $pdf->Cell(0, 1,"",10,'B',1,'C');
    $pdf->Ln(20);

    $dados = [
        ['Item A', 'Descrição 1', 'Categoria X', 10.50],
        ['Item B', 'Descrição 2', 'Categoria Y', 25.75],
        ['Item C', 'Descrição 3', 'Categoria Z', 5.99],
        ['Item D', 'Descrição 4', 'Categoria X', 100.00],
        ['Item E', 'Descrição 5', 'Categoria Y', 12.30],
        ['Item F', 'Descrição 6', 'Categoria Z', 8.20],
        ['Item G', 'Descrição 7', 'Categoria X', 55.00]
    ];

    //cabeçalho da tabela
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100, 20, textoPDF('Produto'), 1, 0, 'L');
    $pdf->Cell(180, 20, textoPDF('Detalhes'), 1, 0, 'L');
    $pdf->Cell(100, 20, textoPDF('Categoria'), 1, 0, 'L');
    $pdf->Cell(100, 20, textoPDF('Valor'), 1, 1, 'R');

    //dados da tabela
    $pdf->SetFont('Arial','',12);
    foreach ($dados as $linha) {
        $pdf->Cell(100, 20, textoPDF($linha[0]), 1, 0, 'L');
        $pdf->Cell(180, 20, textoPDF($linha[1]), 1, 0, 'L');
        $pdf->Cell(100, 20, textoPDF($linha[2]), 1, 0, 'L');
        $pdf->Cell(100, 20, number_format($linha[3], 2, ',', '.'), 1, 1, 'R');
    }
    $pdf->Output("relatorio_produtos.pdf", "I");
    ?>