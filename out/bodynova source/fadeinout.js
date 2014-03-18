
var element = new Array(0, 0, 0);

function fadeinout(i)
{
    if (1 == element[i])
    {
        document.getElementById("fadeinout_content"+i).style.display = 'none';
        document.getElementById("fadeinout_pic"+i).className = 'slideinaktiv';
        document.getElementById("fadeinout"+i).className = 'slideheadinginaktiv';
        element[i] = 0;
    }
    else
    {
        document.getElementById("fadeinout_content"+i).style.display = 'block';
        document.getElementById("fadeinout_pic"+i).className = 'slideaktiv';
        document.getElementById("fadeinout"+i).className = 'slideheadingaktiv';
        element[i] = 1;
    }
}