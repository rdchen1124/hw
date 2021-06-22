class Robot{
    constructor(x,y){
        this.x = x;
        this.y = y;
    }
    getCurrentPosition(){
        return {
            x : this.x,
            y : this.y
        }
    }
    go(instruction){
        switch (instruction) {
            case "N":
                this.y += 1;
                break;

            case "S":
                this.y -= 1;
                break;

            case "E":
                this.x += 1;
                break;

            case "W":
                this.x -= 1;
                break;

            default:
                break;
        }
    }
}
//robot init
robot = new Robot(2,2);
console.log('Origin Postition');
console.log(robot.getCurrentPosition());
//go N
robot.go("N");
console.log(robot.getCurrentPosition());
//go E
robot.go("E");
console.log(robot.getCurrentPosition());
//go S
robot.go("S");
console.log(robot.getCurrentPosition());
//go W
robot.go("W");
console.log(robot.getCurrentPosition());