<?php

namespace AppBundle\Controller\EasyAdmin;

use AppBundle\Services\HomeQueryManager;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends BaseController
{

    /**
     * @Route("/", name="easyadmin")
     */
    public function indexAction(Request $request)
    {
        return parent::indexAction($request);
    }

    /**
     * @Route("/init_home", name="init_home")
     */
    public function InitHomeAction(HomeQueryManager $service, Request $request)
    {

        $startDate=""; $endDate="";

        //FORM
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)


            ->add('startDate', DateType::class, array(
                'data' => new \DateTime('now')
            ))
            ->add('endDate', DateType::class, array(
                'data' => new \DateTime('now')
            ))
            ->add('show data', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            $startDate = $data['startDate'];
            $endDate = $data['endDate'];

        }
        //FORM


        $totalClients = $service->getTotalActiveClients();
        $totalGroups = $service->getTotalGroups();
        $totalEmployees = $service->getTotalEmployees();
        $totalCourses = $service->getTotalCourses();

        $incomeRecivedWithDate = $service->getIncomesWithDate($startDate, $endDate);
        $expensesWithDate = $service->getExpensesWithDate($startDate, $endDate);
        $pendingInvoicesWithDate = $service->getPedingInvoicesWithDate($startDate, $endDate);
        $paidInvoicesWithDate = $service->getPaidInvoicesWithDates($startDate, $endDate);




        return $this->render(
            '@App/easyadmin/menu_home.html.twig',
            [
                'pendingInvoices' => $pendingInvoicesWithDate,
                'incomeRecived' => $incomeRecivedWithDate,
                'expensesWithDate' => $expensesWithDate,
                'paidInvoices' => $paidInvoicesWithDate,
                'totalClients' => $totalClients,
                'totalEmployees' => $totalEmployees,
                'totalGroups' => $totalGroups,
                'totalCourses' => $totalCourses,

                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/redirectInvoicesFilterStatus", name="invoices_filter_status")
     */
    public function redirectInvoicesWithStatusFilter(Request $request)
    {
        return $this->redirectToRoute('easyadmin', array('entity' => 'Invoice', 'action' => 'list', 'dql_filter' => 'entity.status=1'));
    }



    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboardAction()
    {
        return $this->render(
            '@App/easyadmin/menu_dashboard.html.twig'
        );
    }















}
