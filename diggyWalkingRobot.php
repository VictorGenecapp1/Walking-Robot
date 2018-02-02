<?php

const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;

$x = $argv[1];
$y = $argv[2];

if(!is_numeric($x) || !is_numeric($y)){
	die("\nCo-ordinates must be Integer\n");
}

$presentDirection = $argv[3];

if($presentDirection != 'NORTH' && $presentDirection != 'EAST' && $presentDirection != 'SOUTH' && $presentDirection != 'WEST'){
	 die("\nWrong Direction\n");
}

$presentDirectionNumber = constant($presentDirection);

$path = $argv[4];

for($i = 0; $i < strlen($path); $i++ ){

	switch($path{$i}){
		case 'R':
			if($presentDirectionNumber == 4){
				$presentDirectionNumber = 1;
			} else {
				$presentDirectionNumber++;
			}
			break;
                case 'L':
                        if($presentDirectionNumber == 1){
                                $presentDirectionNumber = 4;
                        } else {
                                $presentDirectionNumber--;
                        }
                        break;
                case 'W':
			switch($presentDirectionNumber){
				case NORTH:
					$y += $path{$i+1};
					break;
                                case EAST:
					$x += $path{$i+1};
                                        break;
                                case SOUTH:
                                        $y -= $path{$i+1};
                                        break;
                                case WEST:
                                        $x -= $path{$i+1};
                                        break;
			}
			$i++;
                        break;
		default:
			if(is_numeric($path{$i})){
				echo "\nNumber should be associated with 'W' walk ranging from 0 - 9\n";
			} else {
				echo "\nProvided char '".$path{$i}."' is not valid\n";
			}
			break;
	}

}

echo $x." ".$y." ";

switch($presentDirectionNumber){
	case NORTH:
        	echo "NORTH\n";
                break;
        case EAST:
                echo "EAST\n";
                break;
        case SOUTH:
                echo "SOUTH\n";
                break;
        case WEST:
                echo "WEST\n";
                break;

}

?>
