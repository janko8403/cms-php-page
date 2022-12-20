<?php

namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface {

	// Users
	public function getAllUsers();
	public function getAdminUsers();
	public function getUnActiveUsers();
	public function getUser($id);
	public function createUser(array $request);
	public function deleteUser($id);
	public function activateByAdminUser($id);
	public function activateUser($id);
	public function getToken($token);
	public function reactiveToken($token);

	// Password
	public function updatePassword($request);
	
	
	// Lang 
	public function getAllLanguage();
	public function createLanguage($request);
	public function getLanguageById($id);
	public function updateLanguage($request, $id);
	public function deleteLanguage($id);
	
	// Pages 
	public function getAllPages();
	public function createPage($request);
	public function getPage($id);
	public function updatePage($request, $id);
	public function deletePage($id);
	public function clonePage($id);

	// Footer 
	public function getAllFooters();
	public function createFooter($request);
	public function getFooter($id);
	public function updateFooter($request, $id);
	public function deleteFooter($id);
	public function cloneFooter($id);

	// Get Page 
	public function getPageBySlug($slug);
	
	// Get Footer 
	public function getFooterByLng();

	// Media 
	public function getAllMedia();
	public function getAllMediaPagination();
	public function createMedia($request);
	public function deleteMedia($id);
}