<?php
function row(array $line ) {
  if( count(array_unique($line)) == 1 && $line[0] != 0 ) {
    return $line[0];
  }
  return false;
}
function is_solved(array $board): int {
  
  if( $r = row( $board[0] ) ) return $r;
  if( $r = row( $board[1] ) ) return $r;
  if( $r = row( $board[2] ) ) return $r;
  if( $r = row( [$board[0][0],$board[1][0],$board[2][0]] ) ) return $r;
  if( $r = row( [$board[0][1],$board[1][1],$board[2][1]] ) ) return $r;
  if( $r = row( [$board[0][2],$board[1][2],$board[2][2]] ) ) return $r;
  if( $r = row( [$board[0][0],$board[1][1],$board[2][2]] ) ) return $r;
  if( $r = row( [$board[2][0],$board[1][1],$board[0][2]] ) ) return $r;
  if( !in_array( 0, array_merge( $board[0], $board[1], $board[2] ) )) return 0;
  
  return -1;
}