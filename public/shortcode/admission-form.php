<?php

/**
 * Admission form shortcode : [wdfms-admission-form]
 */

add_shortcode( 'wdfms-admission-form', 'wdfms_shortcode_admission_form'); 
function wdfms_shortcode_admission_form () { ?>

<div class="w3-container w3-padding-32 w3-border">
  <h2 class=" w3-center"><b><u> APPLICATION FORM </u></b></h2>

  <form id="admission_form" action= <?php echo admin_url('admin-ajax.php'); ?> method="post" enctype="multipart/form-data">    
    <?php  wp_nonce_field( 'nonce_action', 'nonce_field' );  ?>  

    <div class="w3-row-padding w3-padding-24">
      <div class="w3-col" style="width: 140px">
        <label class="w3-right">Select Course</label>
      </div>
      <div class="w3-half">      
        <select class="w3-select w3-border" name="course">
          <option value="" disabled selected>Choose your course</option>
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
        </select>
      </div>
    </div>

    <div class="w3-row-padding w3-padding-16">
      <div class="w3-half">
        <label>Name (*)</label>
        <input class="w3-input w3-border" type="text" name="name" value="" placeholder="Name" required>
      </div>
      <div class="w3-half">
        <label>Aadhaar no (*)</label>
        <input class="w3-input w3-border" type="number" name="aadhaar" value="" placeholder="Aadhaar no" required>
      </div>
    </div>  
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-half">
        <label>Father Name (*)</label>
        <input class="w3-input w3-border" type="text" name="f_name" value="" placeholder="Father Name" required>
      </div>
      <div class="w3-half">
        <label>Mother Name (*)</label>
        <input class="w3-input w3-border" type="text" name="m_name" value="" placeholder="Mother Name" required>
      </div>
    </div>
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-third">
        <label>Date of Birth (*)</label>
        <input class="w3-input w3-border" type="date" name="dob" value="" placeholder="Date of birth" required>
      </div>
      
      <div class="w3-third">
        <label>Gender (*)</label>
        <select class="w3-select w3-border" name="gender">
          <option value="" disabled selected>Choose your gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>  
      
      <div class="w3-third">
        <label>Caste Category (*)</label>
        <select class="w3-select w3-border" name="c_category">
          <option value="" disabled selected>Choose your category</option>
          <option value="gen">GEN</option>
          <option value="obc">OBC</option>
          <option value="sc">SC</option>
          <option value="st">ST</option>
          <option value="ph">PH</option>
          <option value="other">Other</option>
        </select>
      </div>
    </div>
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-third">
        <label>Religion (*)</label>
        <select class="w3-select w3-border" name="religion">
          <option value="" disabled selected>Choose your religion</option>
          <option value="hindu">Hindu</option>
          <option value="muslim">Muslim</option>
          <option value="cristain">Cristain</option>
          <option value="sikh">Sikh</option>
          <option value="buddhist">Buddhist</option>
          <option value="jews">Jews</option>
          <option value="other">Other</option>
        </select>
      </div>
      
      <div class="w3-third">
        <label>Marital Status (*)</label>
        <select class="w3-select w3-border" name="m_status">
          <option value="" disabled selected>Choose your marital status</option>
          <option value="single">Single</option>
          <option value="married">Married</option>
          <option value="widowed">Widowed</option>
          <option value="divorced">Divorced</option>
          <option value="separated">Separated</option>
          <option value="other">Other</option>
        </select>
      </div>
      
      <div class="w3-third">
        <label>Disability (*)</label>
        <select class="w3-select w3-border" name="disability">
          <option value="" disabled selected>Choose your disability</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
    </div>
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-third">
        <label>Mobile no (*)</label>
        <input class="w3-input w3-border" type="number" name="mobile" value="" placeholder="Mobile no" required>
      </div>

      <div class="w3-twothird">
        <label>Email Id</label>
        <input class="w3-input w3-border" type="email" name="email" value="" placeholder="Email">
      </div>      
    </div>
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-half">
        <label>Education Qualification (Highest) (*)</label>
        <input class="w3-input w3-border" type="text" name="education_q" value="" placeholder="Education Qualification" required>
      </div>
      <div class="w3-half">
        <label>Technical Qualification (if any)</label>
        <input class="w3-input w3-border" type="text" name="technical_q" value="" placeholder="Technical Qualification" >
      </div>
    </div>
    
    <div class="w3-row-padding w3-padding-16">
      <div class="w3-col">
        <input class="w3-check" type="checkbox" >
        <label>I hereby declare that information mentioned above is true to the best of my knowledge.</label>
      </div>
    </div>

    <div class="w3-row-padding w3-padding-16">
      <div class="w3-col">
        <input type="hidden" name="action" value="admission_form_submit">
        <button type="submit" class="w3-btn w3-white w3-border w3-margin-bottom w3-col m2">Cancel </button>
        <button type="submit" class="w3-btn w3-teal w3-right w3-col m4">Save & Proceed &nbsp; > </button>
      </div>
    </div>  
  </form>
</div>

<?php } ?>