<?php

namespace App\Controllers;

use App\Models\PersonalInfoModel;
use App\Models\AdminModel;
// use CodeIgniter\Controller;

class CVController extends BaseController
{
    protected $personalInfoModel;
    protected $adminModel;
    protected $session;

    public function __construct()
    {
        $this->personalInfoModel = new PersonalInfoModel();
        $this->adminModel = new AdminModel();
        $this->session = session(); // Load session
    }

    // Display the CV
    public function index()
    {
        $data['personalInfo'] = $this->personalInfoModel->getPersonalInfo();
        $data['isAdmin'] = $this->session->get('is_admin');

        return view('cv_view', $data);
    }

    // Admin login page
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($this->adminModel->authenticateAdmin($username, $password)) {
                // Set admin session
                $this->session->set('is_admin', true);
                return redirect()->to('/');
            } else {
                $data['error'] = "Invalid username or password";
            }
        }

        return view('login_view', isset($data) ? $data : []);
    }

    // Logout admin
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    // Edit personal info (only for admin)
    public function editPersonalInfo()
    {
        if (!$this->session->get('is_admin')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() == 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'title' => $this->request->getPost('title'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'profile_description' => $this->request->getPost('profile_description'),
            ];

            $this->personalInfoModel->updatePersonalInfo($data);
            return redirect()->to('/');
        }

        // Load current data for the form
        $data['personalInfo'] = $this->personalInfoModel->getPersonalInfo();

        return view('edit_personal_info_view', $data);
    }
}
