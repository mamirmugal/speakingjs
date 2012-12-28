<script type="text/javascript" src="function.js"></script>
<script type="text/javascript">


    switch(getUri()){
    
        case '1':
            console.log( '"cake".length * 9 :: ' + "cake".length * 9);
            break;
        
        case '2':
            console.log( '"wonderful day".substring(3,7) :: ' + "wonderful day".substring(3,7));
            break;
        
        case '3':
            
            console.log('var divideByThree = function (number) { \n'+
                'var val = number / 3;\n'+
                'console.log(val);\n'+
                '};\n'+
                'divideByThree(6);\n');
            var divideByThree = function (number) {
                var val = number / 3;
                console.log(val);
            };
            divideByThree(6);
            
            break;
            
        case '4':
            
            console.log('var timesTwo = function(number) {\n'+
                'return number * 2;\n'+
                '};\n'+
                ' \n'+
                '// call timesTwo here\n'+
                'var newNumber = timesTwo(10);\n'+
                'console.log(newNumber);\n');
            
            var timesTwo = function(number) {
                return number * 2;
            };

            // call timesTwo here
            var newNumber = timesTwo(10);
            console.log(newNumber);

            break;
        
        case '5':
            
            console.log('var multiplied;\n'+
                'var timesTwo = function(number) {\n'+
                'multiplied = number * 2;\n'+
                '};\n'+
                '\n'+
                'timesTwo(4);\n'+
                'console.log(multiplied);\n');
            
            var multiplied;
            var timesTwo = function(number) {
                multiplied = number * 2;
            };

            timesTwo(4);
            console.log(multiplied);
            
            break;
        
        case '6':
            
            console.log('var junkData = ["Eddie Murphy", 49, "peanuts", 31];\n'+
                '\n'+
                'console.log(junkData[3])\n');
            
            var junkData = ["Eddie Murphy", 49, "peanuts", 31];
            console.log(junkData[3])
            
            break;
     
        case '7':
            
            console.log('var cities = ["Melbourne", "Amman", "Helsinki", "NYC","Melbourne", "Amman", "Helsinki", "NYC"];\n'+
                '\n'+
                'for (var i = 0; i < cities.length; i++) {\n'+
                'console.log("I would like to visit" + " " + cities[i]);\n'+
                '}\n');
            
            var cities = ["Melbourne", "Amman", "Helsinki", "NYC","Melbourne", "Amman", "Helsinki", "NYC"];

            for (var i = 0; i < cities.length; i++) {
                console.log("I would like to visit" + " " + cities[i]);
            }
            
            break;
            
        case '8':
            
            console.log('var coin = Math.floor(Math.random() * 2);\n'+
                '\n'+
                'while(coin){\n'+
                'console.log("Heads! Flipping again...");\n'+
                'var coin = Math.floor(Math.random() * 2);\n'+
                '}\n'+
                'console.log("Tails! Done flipping.");\n');
            
            var coin = Math.floor(Math.random() * 2);

            while(coin){
                console.log("Heads! Flipping again...");
                var coin = Math.floor(Math.random() * 2);
            }
            console.log("Tails! Done flipping.");
            
            break;
            
            console.log('console.log(isNaN("berry"));\n'+
            'console.log(isNaN(NaN));\n'+
            'console.log(isNaN(undefined));\n'+
            'console.log(isNaN(42));\n');
            
            console.log(isNaN("berry"));
            console.log(isNaN(NaN));
            console.log(isNaN(undefined));
            console.log(isNaN(42));
            
        case '9':
            
            
            
            break;
            
    }
  

</script>
<script type="text/javascript">

    function object(){
        var students = {};

        students.name = "Amir";
        students.age = 20;
        students.checkage = function(){
            console.log(" Then name is " + this.name + " and age is " + this.age);
        }

        students.checkage();
    }

</script>

