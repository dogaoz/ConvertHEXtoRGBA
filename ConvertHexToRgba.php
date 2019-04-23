<?php
//
// ConvertHexToRgba.php
// Doga Ozkaracaabatlioglu
// April 21, 2019
// ConvertToRGBA
// Converts Given Hex + Alpha Value to RGBA Value
// Additionally, does unit tests.
//
function convertToRGBA($hex, $alpha)
{
$output_str = "rgba(";
$arr[4] = Array();
# Remove leading char
if (substr($hex, 0, 1) === "#")
{
	$hex = substr($hex, 1, strlen($hex));
}
	
if (strlen($hex) != 3 && strlen($hex) != 6)
{
	return 'Error';
}
	
	
if (strlen($hex) == 3)
{
	$new_hex = '';
	for ($i=0;$i<3;$i++)
	{
	 	$new_hex .= substr($hex,$i,1) . substr($hex,$i,1);
	}
	$hex = $new_hex;
}
	
for ($i=0;$i<6;$i+=2)
{
$output_str .= hexdec(substr($hex,$i,2)) . ', ';
}

$output_str .=  ltrim((float) $alpha, '0'). ')';
return $output_str;
}

echo convertToRGBA("#FFF", "0.3");
echo PHP_EOL;
echo convertToRGBA("#FFFFFF", 1);
echo PHP_EOL;
echo convertToRGBA("FFF", "0.5");
echo PHP_EOL;
echo convertToRGBA("FFFFFF", 1);
echo PHP_EOL;
echo convertToRGBA("#FFFFF", 1);
echo PHP_EOL;
echo convertToRGBA("#F33421", "1");
echo PHP_EOL;

// Unit Tests
function unit_test_1()
{
	if (convertToRGBA("#FFF", "0.3") === "rgba(255, 255, 255, .3)")
		return "PASSED";
	else
		return "Unit Test 1 - Failed.";
}
function unit_test_2()
{
	if (convertToRGBA("#FFFFFF", 1) === "rgba(255, 255, 255, 1)")
		return "PASSED";
	else
		return "Unit Test 2 - Failed.";
}
function unit_test_3()
{
	if (convertToRGBA("FFF", "0.5") === "rgba(255, 255, 255, .5)")
		return "PASSED";
	else
		return "Unit Test 3 - Failed.";
}
function unit_test_4()
{
	if (convertToRGBA("FFFFFF", 1) === "rgba(255, 255, 255, 1)")
		return "PASSED";
	else
		return "Unit Test 4 - Failed.";
}
function unit_test_5()
{
	if (convertToRGBA("#FFFFF", 1) === "Error")
		return "PASSED";
	else
		return "Unit Test 5 - Failed.";
}
function unit_test_6()
{
	if (convertToRGBA("#F33421", 1) === "rgba(243, 52, 33, 1)")
		return "PASSED";
	else
		return "Unit Test 6 - Failed.";
}

echo unit_test_1();
echo PHP_EOL;
echo unit_test_2();
echo PHP_EOL;
echo unit_test_3();
echo PHP_EOL;
echo unit_test_4();
echo PHP_EOL;
echo unit_test_5();
echo PHP_EOL;
echo unit_test_6();
