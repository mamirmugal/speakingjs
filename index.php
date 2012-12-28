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
                'divideByThree(6);');
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
            'console.log(newNumber);');
            
            var timesTwo = function(number) {
                return number * 2;
            };

            // call timesTwo here
            var newNumber = timesTwo(10);
            console.log(newNumber);

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

