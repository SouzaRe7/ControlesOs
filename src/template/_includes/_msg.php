<?php
if (isset($ret)) {
    switch ($ret):
        case -3:
            echo '<script>
            MensagemVazio();
            </script>';
            break;
        case -2:
            echo '<script>
            MensagemExcluirUso();
            </script>';
            break;
        case -1:
            echo '<script>
            MensagemErro();
            </script>';
            break;
        case 0:
            echo '<script>
            MensagemCamposObrigatorios();
            </script>';
            break;
        case 1:
            echo '<script>
            MensagemSucesso(); 
            </script>';
            break;
    endswitch;
}
