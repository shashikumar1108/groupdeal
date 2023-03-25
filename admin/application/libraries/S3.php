<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  

require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class S3 {

	public function uploadObject($sharedConfig,$bucket='',$file_name='',$temp_file_location=''){

		$sdk = new Aws\Sdk($sharedConfig);
		$s3 = $sdk->createS3();

		$result = $s3->putObject([
			'Bucket' 		=> 	$bucket,
			'Key'    		=> 	$file_name,
			'SourceFile' 	=> 	$temp_file_location,
			'ACL'          	=> 	'public-read',			
		]);

		return $result;

	}

	public function uploadFileContent($sharedConfig,$bucket='',$file_name='',$content=''){

		$sdk = new Aws\Sdk($sharedConfig);
		$s3 = $sdk->createS3();

		$result = $s3->putObject([
			'Bucket' 		=> 	$bucket,
			'Key'    		=> 	$file_name,
			'Body' 			=> 	$content,
			'ACL'          	=> 	'public-read',			
		]);
		
		return $result;

	}

	public function getAws($sharedConfig){

		// $sharedConfig = [
		// 	//'profile' => 'default',
		// 	'region' => 'ap-south-1',
		// 	'version' => 'latest',
		// 	'credentials' => array(
		// 		'key'    => 'AKIA3T4R77ICX3RGJPYW',
		// 		'secret' => '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',
		// 	)
		// ];
		
		// Create an SDK class used to share configuration across clients.
		$sdk = new Aws\Sdk($sharedConfig);
		
		// Use an Aws\Sdk class to create the S3Client object.
		$s3 = $sdk->createS3();
		$result = $s3->listBuckets();
		foreach ($result['Buckets'] as $bucket) {
			echo $bucket['Name'] . "\n";
		}
		
		// Convert the result object to a PHP array
		$array = $result->toArray();

		echo '<br><br>List Files<br><br>';
		$objects = $s3->getIterator('ListObjects', array(
			"Bucket" => 'savithrumovies2022',
			"Prefix" => 'ads/' //must have the trailing forward slash "/"
		));
		
		foreach ($objects as $object) {
			echo $object['Key'] . "<br>";
		}
	}

	public function getObjectsList($sharedConfig,$bucket='',$path=''){

		$sdk = new Aws\Sdk($sharedConfig);
		$s3 = $sdk->createS3();

		$result = $s3->listObjects([
			'Bucket' 		=> 	$bucket,
			'Prefix'		=>	$path,
			'MaxKeys'		=>	10
		]);

		return $result;

	}


	public function createFolder($sharedConfig,$bucket='',$key = ''){

		$sdk = new Aws\Sdk($sharedConfig);
		$s3 = $sdk->createS3();

		$result = $s3->putObject([
			'Bucket' 		=> 	$bucket,
			'Key'			=>	$key,
			'Body'			=>	'',
			'ACL'			=>	'public-read',
		]);

		return $result;

	}

	public function createEvent($sharedConfig,$bucket='',$event = ''){

		try {
			$sdk = new Aws\Sdk($sharedConfig);
			$s3 = $sdk->createS3();

			$result = $s3->putObject([
				'Bucket' 		=> 	$bucket,
				'Key'			=>	$event,
				'Body'			=>	'',
				'ACL'			=>	'public-read',
			]);

			$result = $s3->putObject([
				'Bucket' 		=> 	$bucket,
				'Key'			=>	$event.'photos/',
				'Body'			=>	'',
				'ACL'			=>	'public-read',
			]);

			$result = $s3->putObject([
				'Bucket' 		=> 	$bucket,
				'Key'			=>	$event.'videos/',
				'Body'			=>	'',
				'ACL'			=>	'public-read',
			]);

			return $event;
		}catch (Exception $exception) {
			// echo "Failed to list objects in $bucket_name with error: " . $exception->getMessage();
			// exit("Please fix error with listing objects before continuing.");
			return '';
		}

	}

}
 