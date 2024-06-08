@extends('layout.front.main')
@section('content')

@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<section class="form-section">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h5 class="text-dark font-weight-600">{{__('front.privacy policy')}}</h5>
        <hr>
      </div>
      <div class="col-md-12">
        <p>
          <!-- @if($langg=='ar')
          {{$contact->policy_ar }}
          @else
          {{$contact->policy_en}}
          @endif -->
        </p>

        <h6>Terms and Condition</h6>
        <p>
          Welcome to sanad applications, where you can find our partner merchants' terms and conditions. Before
          ordering, please
          read these carefully. By accessing our application and placing an order, you agree to these terms and our
          terms of use
          policy. If you don't accept them, don't use our service.</p>

        <h6>INFORMATION ABOUT US</h6>
        <p>Our service connects users to Partner Retailers, enabling them to order products, market products on their
          behalf,complete orders, and deliver them.</p>

        <h6>PURPOSE</h6>
        <p>Our service connects users to Partner Retailers, enabling them to order products, market products on their
          behalf,complete orders, and deliver them.</p>

        <h6>SERVICE AVAILABILITY</h6>
        <p>sanad provides ordering and delivery services from Partner Retilers in Qatar, with each retailer having a
          specific
          delivery schedule. Orders outside delivery areas may not be possible. Operating hours may vary based on local
          trading
          conditions and partner retailer availability. Users can view menus and submit orders to selected merchants.
        </p>

        <h6>Order</h6>

        <p>sanad sends a confirmation email to customers after placing an order through their service, confirming
          the order
          has
          been received and accepted by Partner Retailers. The contract for product supply is formed after the email is
          sent. To
          ensure proper delivery, customers must provide an accurate email address and telephone number. sanad
          prioritizes
          quality
          service and closely monitors Partner Merchants to maintain their reputation. If you have any comments, please
          contact
          them via email or phone.</p>

        <h6>PRODUCTS</h6>
        <p>Orders are subject to availability and partner merchants may offer alternatives or use nuts in certain
          products.
          Please
          note in application or contact partner merchants.</p>

        <h6>AVAILABILITY AND DELIVERY</h6>
        <p>Order availability and delivery are our top priority, but factors like traffic and weather can affect our
          delivery
          schedule. The timing of your order is determined by the number of orders and the Partner Merchant's
          circumstances. The
          AVG delivery time is an average time, not a fixed one, and can vary by 15 minutes.</p>

        <h6>CANCELLATION</h6>
        <p>You can cancel an order before it becomes a Started Order, and sanad and the Partner Merchant can do so.
          The
          reason for
          cancellation will be communicated to you. Payments made before cancellation will usually be reimbursed within
          seven
          working days. If an order becomes a Started Order, sanad will determine if it is canceled.</p>


        <h6>PRICE AND PAYMENT</h6>
        <p>Prices on our Service are listed and can change at any time. Orders with a confirmed email may be affected by
          price
          changes, except for obvious pricing mistakes. Prices may be incorrect, and the relevant Partner Merchant
          verifies them.
          Payments can be made by cash on delivery or credit or debit card, authorized by sanad and passed on to the
          Partner
          Merchant. Payment to sanad discharges obligations to pay the Partner Merchant.</p>


        <h6>OUR LIABILITY</h6>
        <p>sanad provides its Service and content on an "as-is" and "as available" basis, without any representation or
          warranty
          regarding its content, availability, or error-freeness. sanad and its Partner Merchant cannot be held liable
          for
          any
          direct, indirect, special, or consequential losses or damages arising from the use of or inability to use the
          Service.
          Their total aggregate liability is limited to the purchase price of the Products you ordered.</p>

        <h6>WAIVER</h6>
        <p>sanad and Partner Merchant are not liable for any delays or non-performance due to factors beyond their
          control,
          such as
          acts of God, governmental acts, war, fire, flood, explosion, or civil commotion.</p>


        <h6>SEVERABILITY</h6>
        <p>If any provision of this agreement is judged to be illegal or unenforceable, the continuation in full force
          and
          effect
          of the remainder of the provisions shall not be prejudiced.</p>
        <h6>ENTIRE AGREEMENT</h6>
        <p>These terms contain the whole agreement between the parties relating to its subject matter and all prior
          agreements,
          arrangements, and understandings between the parties relating to that subject matter.</p>

        <h6>OUR RIGHT TO VARY THESE TERMS AND CONDITIONS</h6>
        <p>sanad may revise these terms of use at any time by amending this page. You are expected to check this page
          from
          time to
          time to take notice of any changes we make, as they are binding on you.</p>

        <h6>LAW AND JURISDICTION</h6>
        <p>The Qatar courts will have jurisdiction over any claim arising from or related to, any use of our Services.
          These terms
          of use and any dispute or claim arising out of or in connection with them or their subject matter or formation
          (including non-contractual disputes or claims) shall be governed by and construed in accordance with the law
          of Qatar.</p>
        <h6>sanad TERMS OF USE FOR WEBSITE AND APPLICATIONS</h6>
        <p>This page outlines the terms of use for sanad.qa, our website and applications, for both guests and
          registered
          users. By
          accessing or using our services, you agree to these terms and abide by them. If you do not agree, do not use
          our
          site or
          services.</p>

        <h6>ACCESSING OUR SERVICE OR OUR SERVICES</h6>
        <p>Access to our Site and Service is temporary and subject to change without notice. We are not liable for any
          unavailable
          time or period. We may restrict access to certain parts or the entire Service. Users are responsible for
          maintaining
          login confidentiality and account activities. If you have concerns or suspicions, contact info@sanadqa.
          Account
          deactivation is possible.</p>

        <h6>ACCEPTABLE USE</h6>
        <p>You may use our Service only for lawful purposes. You may not use our Site or our Service in any way that
          breaches any
          applicable local, national or international law or regulation or to send, knowingly receive, upload, download,
          use or
          re-use any material which does not comply with our content standards in Clause 5 below. You also agree not to
          access
          without authority, interfere with, damage or disrupt any part of our Site or our Service or any network or
          equipment
          used in the provision of our Service.</p>
        <h6>INTERACTIVE FEATURES OF OUR SITE</h6>
        <p>Our site offers interactive features like chat rooms, but we generally don't moderate them. If we do, we'll
          inform you
          before using the service and provide a means to contact the moderator if you have any issues.</p>

        <h6>CONTENT STANDARDS</h6>
        <p>The content standards for the Service and its interactive services are as follows: contributions must be
          accurate,
          genuinely held, and comply with applicable laws in Qatar and the country from which they are posted.
          Contributions
          should not contain defamatory, obscene, offensive, hateful, inflammatory, sexually explicit, violence,
          discrimination,
          copyright infringement, breach of legal duty, threatening, abusive, invasion of privacy, impersonation, or
          promote
          unlawful acts such as copyright infringement or computer misuse.</p>










        <h6>SUSPENSION AND TERMINATION</h6>
        <p>Failure to adhere to Acceptable Use and Content Standards in these Terms of Use constitutes a breach,
          resulting
          in
          immediate withdrawal of user rights, removal of uploaded material, warning, legal action, and disclosure of
          information
          to law enforcement authorities. Other actions may be taken as necessary.</p>

        <h6>INTELLECTUAL PROPERTY RIGHTS</h6>
        <p>We own or license all intellectual property rights in our Site and Service, protected by copyright laws and
          treaties
          worldwide. You may not use content except for personal, non-commercial use, excluding contributions.</p>

        <h6>RELIANCE ON INFORMATION POSTED</h6>
        <p>Commentary and other materials posted on our Service are not intended to amount to advice on which reliance
          should be
          placed. We, therefore, disclaim all liability and responsibility arising from any reliance placed on such
          materials by
          any visitor to our Service, or by anyone who may be informed of any of its contents.</p>

        <h6>OUR SITE AND OUR SERVICE CHANGE REGULARLY</h6>
        <p>We aim to update our Site and our Service regularly and may change the content at any time. If the need
          arises,
          we may
          suspend access to our Site and our Service, or close them indefinitely. Any of the material on our Site or our
          Service
          may be out of date at any given time, and we are under no obligation to update such material.</p>

        <h6>OUR LIABILITY</h6>
        <p>Our Site and Service are prepared with care, but we cannot be held responsible for errors or technical
          problems.
          We will
          correct inaccuracies promptly. We exclude liability for loss or damage arising from our Site, Service, or
          linked
          websites, but not for negligence, fraudulent misrepresentation, or other liability that cannot be excluded or
          limited
          under applicable law.</p>

        <h6>UPLOADING MATERIAL TO OUR SITE AND OUR SERVICE</h6>
        <p>Any material you upload to our Service or data that we collect as set out above (Section 11) will be
          considered
          non-confidential and non-proprietary, and you acknowledge and agree that we have the right to use, copy,
          distribute,
          sell and disclose to third parties any such material or data for any purpose related to our business. To the
          extent that
          such material is protected by intellectual property rights, you grant us a perpetual, worldwide, royalty-free
          license to
          use, copy, modify, distribute, sell and disclose to third parties any such material or data for any purpose
          related to
          our business.</p>



        <h6>LINKS FROM OUR SITE</h6>
        <p>Where our Site contains links to other sites and resources provided by third parties, these links are
          provided
          for your
          information only. We have no control over the contents of those sites or resources and accept no
          responsibility
          for them
          or for any loss or damage that may arise from your use of them.</p>
        <h6>JURISDICTION AND APPLICABLE LAW</h6>
        <p>WThe Qatar courts will have jurisdiction over any claim arising from, or related to, a visit to our Site or
          use
          of our
          Services. These terms of use and any dispute or claim arising out of or in connection with them or their
          subject
          matter
          or formation (including non-contractual disputes or claims) shall be governed by and construed in accordance
          with the
          law of Qatar.
        <p>


        <h6>VARIATIONS</h6>
        <p>We may revise these terms of use at any time by amending this page. You are expected to check this page from
          time to
          time to take notice of any changes we make, as they are binding on you.</p>

        <h6>YOUR CONCERNS</h6>
        <p>If you have any concerns about material which appears on our Service, please contact info@sanad.com.</h6>
        <h6>DELIVERY FEE</h6>
        <p>sanad is a delivery service company. We are a mediator between the customer and the Merchant. We are not a
          Merchant to
          be under the law of the ministry of commerce and between 5 up to 10 QAR is our charge for delivering the order
          to your
          place with the best service</p>

        <h6>MISSING ITEM OR PARTIAL CANCELLATION</h6>
        <p>In the event of a missing item or partial cancellation, customers can request a new item or refund. If the
          customer
          refuses to accept the item, they can receive the money back through cash or credits on the sanad app. If the
          customer
          refuses to accept the item again, they cannot refund the money back to the card. If the item is not available
          at
          the
          merchant, the total invoice can be removed. If the customer is unreachable, the product will be returned to
          the
          merchant
          as a normal order, with no refund for the customer.</p>

        <p>Copyright © 2024 All rights reserved sanad Trading</p>

      </div>





    </div>
  </div>
</section>
@endsection