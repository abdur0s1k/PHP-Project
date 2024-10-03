<?php
function is_solved(array $board): int {

    for ($i = 0; $i < 3; $i++) {

        if ($board[$i][0] === $board[$i][1] && $board[$i][1] === $board[$i][2] && $board[$i][0] !== 0) {
            return $board[$i][0];
        }
