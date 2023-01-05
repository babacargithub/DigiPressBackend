<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public $dummyTransactionsResponse = '{
    "page_info": {
        "start_cursor": null,
        "end_cursor": "TFRfNE5iLWxHMncyTG80",
        "has_next_page": false
    },
    "date": "2022-12-18",
    "items": [
        {
            "timestamp": "2022-12-18T01:17:09Z",
            "transaction_id": "T_E4PDZ6KN4Q",
            "amount": "3366",
            "fee": "34",
            "currency": "XOF",
            "counterparty_name": "Khady Gueye",
            "counterparty_mobile": "+221776922446",
            "client_reference": "{\"type\":\"booking\",\"id\":150995}",
            "checkout_api_session_id": "cos-1bsdxe8p8108y"
        },
        {
            "timestamp": "2022-12-18T11:03:44Z",
            "transaction_id": "T_GQ4SWKBVUA",
            "amount": "3366",
            "fee": "34",
            "currency": "XOF",
            "counterparty_name": "ÉMILIE NDIAYE  SECK NDIANE",
            "counterparty_mobile": "+221771542726",
            "client_reference": "{\"type\":\"booking\",\"id\":151001}",
            "checkout_api_session_id": "cos-1bsp9xs7011yp"
        },
        {
            "timestamp": "2022-12-18T11:58:26Z",
            "transaction_id": "T_BIHF3Z3ZYQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Tanor Ndiaye",
            "counterparty_mobile": "+221784040422",
            "client_reference": "{\"type\":\"booking\",\"id\":150998}",
            "checkout_api_session_id": "cos-1bsq2zxe012g2"
        },
        {
            "timestamp": "2022-12-18T12:43:47Z",
            "transaction_id": "T_252D7ELEZQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "MASSYLLA NDIAYE",
            "counterparty_mobile": "+221777505461",
            "client_reference": "{\"type\":\"booking\",\"id\":151003}",
            "checkout_api_session_id": "cos-1bsqqr9yr103r"
        },
        {
            "timestamp": "2022-12-18T16:43:00Z",
            "transaction_id": "T_KHL544X7LQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Zacaria Sane",
            "counterparty_mobile": "+221781635317",
            "client_reference": "{\"type\":\"depart\",\"id\":2235}",
            "checkout_api_session_id": "cos-1bsv5486r12aw"
        },
        {
            "timestamp": "2022-12-18T17:11:50Z",
            "transaction_id": "T_6FYVVNPBXM",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Aissatou Diop",
            "counterparty_mobile": "+221775606837",
            "client_reference": "{\"type\":\"depart\",\"id\":2222}",
            "checkout_api_session_id": "cos-1bsvjdqdg12vg"
        },
        {
            "timestamp": "2022-12-18T17:19:13Z",
            "transaction_id": "T_P7KVFGIIWE",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Ndeye Fatou Ndiole Faye",
            "counterparty_mobile": "+221773974263",
            "client_reference": "{\"type\":\"depart\",\"id\":2235}",
            "checkout_api_session_id": "cos-1bsvns2tg12vc"
        },
        {
            "timestamp": "2022-12-18T19:10:33Z",
            "transaction_id": "T_Z5R3NQT2LM",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "El Hadji Abdou Aziz Ndao",
            "counterparty_mobile": "+221781144908",
            "client_reference": "{\"type\":\"depart\",\"id\":2236}",
            "checkout_api_session_id": "cos-1bsx8qzzr117y"
        },
        {
            "timestamp": "2022-12-18T19:47:32Z",
            "transaction_id": "T_N4I5V54IPQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "ndèye fatou fall",
            "counterparty_mobile": "+221783898423",
            "client_reference": "{\"type\":\"depart\",\"id\":2235}",
            "checkout_api_session_id": "cos-1bsxsje7g13f2"
        },
        {
            "timestamp": "2022-12-18T20:08:42Z",
            "transaction_id": "T_WIUOTF5WHY",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Aminata Ndiaye",
            "counterparty_mobile": "+221785331080",
            "client_reference": "{\"type\":\"depart\",\"id\":2235}",
            "checkout_api_session_id": "cos-1bsy33thr128w"
        },
        {
            "timestamp": "2022-12-18T20:31:33Z",
            "transaction_id": "T_C6HLCQ2MHQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Idrissa Hanne",
            "counterparty_mobile": "+221778066162",
            "client_reference": "{\"type\":\"depart\",\"id\":2236}",
            "checkout_api_session_id": "cos-1bsydrp3011be"
        },
        {
            "timestamp": "2022-12-18T20:34:07Z",
            "transaction_id": "T_IFB5EATJYQ",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Adama Dia",
            "counterparty_mobile": "+221770485986",
            "client_reference": "{\"type\":\"depart\",\"id\":2222}",
            "checkout_api_session_id": "cos-1bsyebnb011ze"
        },
        {
            "timestamp": "2022-12-18T20:36:20Z",
            "transaction_id": "T_ITPTBRY3IA",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Abdoulaye Cissé",
            "counterparty_mobile": "+221775204164",
            "client_reference": "{\"type\":\"booking\",\"id\":151034}",
            "checkout_api_session_id": "cos-1bsyg2nag13s4"
        },
        {
            "timestamp": "2022-12-18T20:46:35Z",
            "transaction_id": "T_XNSWI7VJ44",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Madelene Agness Faye",
            "counterparty_mobile": "+221778357528",
            "client_reference": "{\"type\":\"booking\",\"id\":151035}",
            "checkout_api_session_id": "cos-1bsymq48010qc"
        },
        {
            "timestamp": "2022-12-18T20:52:30Z",
            "transaction_id": "T_SL5FVDWSGE",
            "amount": "3267",
            "fee": "33",
            "currency": "XOF",
            "counterparty_name": "Paul Michel Diogoye Ndour",
            "counterparty_mobile": "+221777873807",
            "client_reference": "{\"type\":\"depart\",\"id\":2235}",
            "checkout_api_session_id": "cos-1bsyqbk0g13g8"
        }
    ]
}';
    public function test_guess_customer_name_from_transactions(){

        $dummyTransactions = json_decode($this->dummyTransactionsResponse, true);

        $this->assertIsArray($dummyTransactions);
        $this->assertArrayHasKey("items",$dummyTransactions);
        $this->assertIsArray($dummyTransactions["items"]);
        $this->assertTrue(count($dummyTransactions["items"]) == 15);
        $this->assertIsString("Paul Michel Diogoye Ndour", $this->guessCustomerNameFromTransactions("+221777873807"));
        $this->assertIsString("Madelene Agness Faye", $this->guessCustomerNameFromTransactions("+221778357528"));
        $this->assertIsString("Abdoulaye Cissé", $this->guessCustomerNameFromTransactions("+221775204164"));
        $this->assertIsString("Abdoulaye Cissé", $this->guessCustomerNameFromTransactions("775204164"));


    }
    public function guessCustomerNameFromTransactions($phoneNumber) : ?string
    {
        $response = json_decode($this->dummyTransactionsResponse,true);

        if (isset($response["items"])){
            $transactions = $response["items"];
            $names = array_column($transactions,"counterparty_name");
            $phoneNumbers = array_column($transactions,"counterparty_mobile");

            $phoneNumbers = array_map(function ($value){
                return substr($value, -9,9);},
                $phoneNumbers);

            $matchKey =  array_search(substr($phoneNumber, -9,9), $phoneNumbers);
            if ($matchKey != false && is_numeric($matchKey)){

                return $names[$matchKey];
            }
        }
        return null;
    }
}
