<?php
function is_solved(array $board): int {

    for ($i = 0; $i < 3; $i++) {
        
        if ($board[$i][0] === $board[$i][1] && $board[$i][1] === $board[$i][2] && $board[$i][0] !== 0) {
            return $board[$i][0];
        }
        // Проверка столбцов
        if ($board[0][$i] === $board[1][$i] && $board[1][$i] === $board[2][$i] && $board[0][$i] !== 0) {
            return $board[0][$i];
        }
    }

    return 0;
} 
?>