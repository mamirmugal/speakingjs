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
            
            console.log('var bob = new Object();\n'+
                'bob.name = "Bob Smith";\n'+
                'bob.age = 30;\n'+
                '// Here is susan1, in literal notation\n'+
                'var susan1 = {\n'+
                'name: "Susan Jordan",\n'+
                'age: 24\n'+
                '};\n');
            
            var bob = new Object();
            bob.name = "Bob Smith";
            bob.age = 30;
            // Here is susan1, in literal notation
            var susan1 = {
                name: "Susan Jordan",
                age: 24
            };
            
            break;

        case '10':
           
            console.log('var bob = new Object();\n'+
                'bob.age = 30;\n'+
                '// this time we have added a method, setAge\n'+
                'bob.setAge = function (newAge){\n'+
                '  bob.age = newAge;\n'+
                '};\n'+
                '\n'+
                'bob.getYearOfBirth = function () {\n'+
                '  return 2012 - bob.age;\n'+
                '};\n'+
                'console.log(bob.getYearOfBirth());\n');
           
            var bob = new Object();
            bob.age = 30;
            // this time we have added a method, setAge
            bob.setAge = function (newAge){
                bob.age = newAge;
            };

            bob.getYearOfBirth = function () {
                return 2012 - bob.age;
            };
            console.log(bob.getYearOfBirth()); F
           
            break;

        case '11':
            
            console.log('function Person(name,age) {\n'+
                'this.name = name;\n'+
                'this.age = age;\n'+
                '}\'n'+
            '\n'+
            '// Lets make bob and susan again, using our constructor\n'+
            'var bob = new Person("Bob Smith", 30);\n'+
            'var susan = new Person("Susan Jordan", 25);\n');
            
        function Person(name,age) {
            this.name = name;
            this.age = age;
        }

        // Let's make bob and susan again, using our constructor
        var bob = new Person("Bob Smith", 30);
        var susan = new Person("Susan Jordan", 25);
            
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

