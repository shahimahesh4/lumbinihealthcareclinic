<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@lumbinihealthcare.com'],
            [
                'name' => 'Lumbini Health Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Clinical Services with comprehensive SEO & clinical metadata
        $serviceGyn = Service::updateOrCreate(
            ['slug' => 'gynecology-obstetrics'],
            [
                'title' => 'Gynecology & Obstetrics',
                'icon' => 'heart-pulse',
                'short_description' => 'Comprehensive maternal care, painless labor management, prenatal ultrasound, and reproductive healthcare.',
                'full_description' => 'Our Department of Gynecology & Obstetrics delivers patient-centered, compassionate care for women at every stage of life. From adolescent reproductive health to high-risk pregnancy monitoring, prenatal screening, and post-delivery maternal wellness, our specialized team led by senior gynecologists ensures the highest clinical safety standards in a warm and reassuring environment.',
                'image_url' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => 'Gynecology & Maternity Care Clinic in Bhairahawa | Lumbini Health Care',
                'meta_description' => 'Expert gynecologist consultations, 4D prenatal ultrasound scans, painless delivery, and women wellness at Lumbini Health Care Center, Bhairahawa. Book appointment.',
                'meta_keywords' => 'gynecologist bhairahawa, maternity clinic butwal, normal delivery nepal, women reproductive health, prenatal ultrasound bhairahawa',
                'canonical_url' => null,
                'features' => [
                    'High-Risk Pregnancy & Prenatal Care',
                    '4D Fetal Anomaly Ultrasound & Doppler',
                    'Normal & Cesarean Delivery Support',
                    'Infertility & Reproductive Health Counseling',
                    'Cervical Cancer Screening & Pap Smears',
                    'PCOS / PCOD Management & Adolescent Gynecology',
                ],
                'preparation_guidelines' => "For routine pelvic ultrasound: Please drink 1 to 1.5 liters of clean water 1 hour prior to your examination and do not urinate until the scan is completed.\nFor Pap smear or fertility testing, consult your gynecologist between day 2-5 of your menstrual cycle.\nAlways bring previous maternity records and ultrasound reports.",
                'faqs' => [
                    [
                        'question' => 'When should I schedule my first prenatal appointment?',
                        'answer' => 'It is recommended to schedule your first prenatal visit as soon as you confirm pregnancy with a home test, ideally around 6 to 8 weeks.',
                    ],
                    [
                        'question' => 'Do you provide 3D and 4D ultrasound scans?',
                        'answer' => 'Yes, our diagnostic imaging unit is equipped with high-resolution digital ultrasound systems providing detailed 3D/4D fetal scans and anomaly evaluations.',
                    ],
                    [
                        'question' => 'Can I book a same-day appointment with Dr. Sushmita Adhikari?',
                        'answer' => 'Yes, same-day appointments are available depending on daily clinic slots. You can reserve online or call our helpline at 071-591486.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 1,
            ]
        );

        $serviceMed = Service::updateOrCreate(
            ['slug' => 'general-medicine-opd'],
            [
                'title' => 'General Medicine & OPD',
                'icon' => 'stethoscope',
                'short_description' => 'Routine preventive consultations, chronic disease management, seasonal illness diagnosis, and health screening packages.',
                'full_description' => 'The General Medicine and Outpatient Department (OPD) at Lumbini Health Care provides first-line clinical evaluation, precision diagnosis, and evidence-based medical treatment. Our senior consultant physicians manage infectious illnesses, hypertension, metabolic diabetes, gastrointestinal disorders, and cardiovascular prevention with long-term holistic patient follow-up.',
                'image_url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => 'General Medicine & Outpatient OPD in Bhairahawa | Lumbini Health Care',
                'meta_description' => 'Consult senior physicians for fever, hypertension, diabetes, respiratory illness, and routine health checks at Lumbini Health Care Clinic, Bhairahawa.',
                'meta_keywords' => 'internal medicine bhairahawa, general physician clinic, diabetes doctor butwal, blood pressure clinic nepal, opd hospital bhairahawa',
                'canonical_url' => null,
                'features' => [
                    'Comprehensive Adult & Elderly Health Checkups',
                    'Diabetes & Hypertension Long-term Management',
                    'Seasonal Viral Fevers & Typhoid Treatment',
                    'Cardiovascular Risk Assessment & ECG',
                    'Preventive Executive Health Screening',
                    'Gastroenterology & Acid Peptic Disease Care',
                ],
                'preparation_guidelines' => "For fasting blood sugar (FBS) and lipid profile tests, observe 10 to 12 hours of overnight fasting. Plain water is allowed.\nPlease bring your current medications and prescription history.\nWear comfortable clothing for routine physical and blood pressure examinations.",
                'faqs' => [
                    [
                        'question' => 'What are your OPD consultation hours?',
                        'answer' => 'Our outpatient department runs Monday through Saturday from 7:00 AM to 8:00 PM. Emergency triage is open 24/7.',
                    ],
                    [
                        'question' => 'Should I fast before general blood tests?',
                        'answer' => 'If you are having fasting blood sugar (FBS), lipid profile, or liver panel, an 8-12 hour fast is required. Plain water is permitted.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 2,
            ]
        );

        $servicePed = Service::updateOrCreate(
            ['slug' => 'pediatrics-child-care'],
            [
                'title' => 'Pediatrics & Child Care',
                'icon' => 'baby',
                'short_description' => 'Child health checkups, national vaccination protocols, pediatric emergencies, and nutritional growth monitoring.',
                'full_description' => 'We deliver loving, specialized healthcare for newborns, infants, children, and adolescents. Our pediatric specialists emphasize developmental milestone tracking, nutrition and immunity strengthening, gentle treatment of childhood respiratory infections, and stress-free vaccination schedules.',
                'image_url' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => 'Pediatrician & Child Health Clinic in Bhairahawa | Lumbini Health Care',
                'meta_description' => 'Gentle and specialized pediatric care in Bhairahawa. Newborn intensive care, WHO/Nepal national vaccination, and child growth monitoring. Call 071-591486.',
                'meta_keywords' => 'child specialist bhairahawa, pediatrician clinic butwal, baby vaccination center nepal, newborn checkup rupandehi',
                'canonical_url' => null,
                'features' => [
                    'Government & Optional Pediatric Vaccinations',
                    'Newborn & Infant Development Assessments',
                    'Pediatric Respiratory & Asthma Management',
                    'Childhood Nutrition, Anemia & Stunting Correction',
                    'Neonatal Jaundice Phototherapy Support',
                    'Emergency Pediatric Triage & Nebulization',
                ],
                'preparation_guidelines' => "Please bring your child's vaccination card/record booklet and any previous medication history.\nDress your child in comfortable clothing that can be easily unbuttoned for clinical examination.\nFeed infants 30 minutes before the consultation to keep them calm.",
                'faqs' => [
                    [
                        'question' => 'Which vaccines are administered at Lumbini Health Care?',
                        'answer' => 'We provide all National Immunization Schedule vaccines along with optional vaccines including MMR, Typhoid Conjugate, Chickenpox, Hepatitis A, and Influenza.',
                    ],
                    [
                        'question' => 'How do you handle acute pediatric fever or breathing difficulty?',
                        'answer' => 'Our clinic has dedicated pediatric nebulization, oxygenation, and emergency observation beds with immediate doctor review.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 3,
            ]
        );

        $serviceOrtho = Service::updateOrCreate(
            ['slug' => 'orthopedics-spine-care'],
            [
                'title' => 'Orthopedics & Spine Care',
                'icon' => 'bone',
                'short_description' => 'Management of joint pain, arthritis, fractures, spine ailments, and post-injury physiotherapy rehabilitation.',
                'full_description' => 'Our Orthopedic department provides comprehensive diagnostic and therapeutic solutions for acute bone trauma, sports-related ligament injuries, degenerative joint diseases, and spine disorders. We combine conservative non-invasive management, intra-articular injections, plaster immobilization, and personalized physical rehabilitation.',
                'image_url' => 'https://images.unsplash.com/photo-1581595220892-b0739db3ba8c?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1581595220892-b0739db3ba8c?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => 'Orthopedic & Bone Care Clinic in Bhairahawa | Lumbini Health Care',
                'meta_description' => 'Specialized orthopedic consultation for joint pain, arthritis, fractures, spine problems, and sports injuries in Bhairahawa, Nepal.',
                'meta_keywords' => 'orthopedic doctor bhairahawa, bone specialist rupandehi, arthritis clinic butwal, fracture plaster casting nepal',
                'canonical_url' => null,
                'features' => [
                    'Arthritis, Osteoporosis & Joint Pain Therapy',
                    'Fracture Plaster Casting & Splinting',
                    'Spine, Sciatica & Lumbar Disc Management',
                    'Post-trauma & Post-operative Physiotherapy Guidance',
                    'Intra-articular Joint Injections',
                    'Sports Ligament & Tendon Strain Recovery',
                ],
                'preparation_guidelines' => "Bring any prior X-Rays, MRI, or CT scans if available.\nWear loose-fitting garments around the affected joint (knee, shoulder, ankle) to facilitate physical examination.\nAvoid heavy physical exertion on injured limbs before examination.",
                'faqs' => [
                    [
                        'question' => 'Can I get an X-Ray done during the same visit?',
                        'answer' => 'Yes, our diagnostic partner facility provides instant digital X-Ray imaging for bone and joint analysis.',
                    ],
                    [
                        'question' => 'Do you treat chronic low back pain and sciatica without surgery?',
                        'answer' => 'Yes, we focus on conservative management including medical therapy, ergonomic correction, and targeted physical rehab before considering surgical referral.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 4,
            ]
        );

        $serviceDiag = Service::updateOrCreate(
            ['slug' => 'digital-usg-diagnostic-lab'],
            [
                'title' => 'Digital USG & Diagnostic Lab',
                'icon' => 'microscope',
                'short_description' => 'High-resolution color Doppler ultrasound, 12-lead digital ECG, and fast fully automated clinical pathology tests.',
                'full_description' => 'Lumbini Health Care Center diagnostic wing is powered by high-precision Japanese and German automated analyzers. We conduct automated hematology, clinical chemistry, hormone assays, 12-lead digital electrocardiograms (ECG), and real-time color Doppler ultrasonography with same-day verified reporting.',
                'image_url' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => 'Digital Ultrasound & Diagnostic Pathology Lab in Bhairahawa',
                'meta_description' => 'Fast and accurate digital USG, 12-lead ECG, and automated pathology lab tests in Bhairahawa. Verified reports with quick turnaround time.',
                'meta_keywords' => 'ultrasound bhairahawa, usg lab near me, blood test center butwal, ecg test rupandehi, pathology lab bhairahawa',
                'canonical_url' => null,
                'features' => [
                    'High-Resolution Color Doppler Ultrasound',
                    '12-Lead Digital Electrocardiogram (ECG)',
                    'Fully Automated Biochemistry & Hematology',
                    'Thyroid Profile, Hormone Panels & Vitamin D/B12',
                    'Liver & Renal Function Tests (LFT, RFT)',
                    'Instant Urine & Stool Microscopic Analysis',
                ],
                'preparation_guidelines' => "For Whole Abdomen USG: 6 to 8 hours fasting is required. Plain water allowed.\nFor Pelvic / Early Pregnancy USG: Drink 4 to 5 glasses of water 1 hour prior and hold urine until scan.\nFor Fasting Blood Sugar / Lipid Profile: 10 to 12 hours overnight fast is essential.",
                'faqs' => [
                    [
                        'question' => 'When can I collect my pathology test results?',
                        'answer' => 'Routine blood, urine, and biochemistry reports are available within 2 to 4 hours. Ultrasound reports are provided immediately following the scan.',
                    ],
                    [
                        'question' => 'Is doctor recommendation mandatory for diagnostic tests?',
                        'answer' => 'While doctor referrals are preferred, preventive wellness packages and routine sugar/pressure tests can be taken without a prescription.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 5,
            ]
        );

        $serviceEmerg = Service::updateOrCreate(
            ['slug' => '24-7-pharmacy-emergency'],
            [
                'title' => '24/7 Pharmacy & Emergency',
                'icon' => 'truck-medical',
                'short_description' => 'Round-the-clock emergency first-aid triage, oxygen therapy, and fully stocked authentic pharmaceutical dispensary.',
                'full_description' => 'Our 24/7 emergency unit is prepared around the clock to handle sudden medical crises with immediate stabilization, vital signs monitoring, continuous oxygen support, and minor wound management. The attached 24-hour retail dispensary maintains 100% genuine, cold-chain preserved medicines at regulated prices.',
                'image_url' => 'https://images.unsplash.com/photo-1586015555751-63c2999824f5?auto=format&fit=crop&w=800&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1586015555751-63c2999824f5?auto=format&fit=crop&w=1200&h=630&q=80',
                'meta_title' => '24/7 Pharmacy & Emergency Triage in Bhairahawa | Lumbini Health Care',
                'meta_description' => 'Reliable 24-hour medical emergency first-aid, oxygen therapy, and authentic pharmacy dispensary in Bhairahawa. Open 365 days.',
                'meta_keywords' => 'emergency clinic bhairahawa, 24 hour pharmacy butwal, night pharmacy rupandehi, oxygen support clinic nepal',
                'canonical_url' => null,
                'features' => [
                    '24/7 Dispensing of 100% Genuine Certified Medicines',
                    'Immediate Emergency First-Aid & Wound Suturing',
                    'Continuous Oxygen Therapy & Nebulization Stations',
                    'Cold-Chain Maintained Insulin & Biologicals',
                    'Home Delivery of Chronic Medications in Bhairahawa',
                    'Vital Signs Monitoring & Minor Procedure Room',
                ],
                'preparation_guidelines' => "For prescription medications, please carry an authorized doctor prescription with dosage instructions.\nIn emergency trauma, patients are received immediately at the emergency door without delay.",
                'faqs' => [
                    [
                        'question' => 'Is the pharmacy open on public holidays and late nights?',
                        'answer' => 'Yes, our pharmacy counter operates 24 hours a day, 7 days a week, including all public and festival holidays.',
                    ],
                    [
                        'question' => 'Can I verify if a specialized medicine is in stock?',
                        'answer' => 'Yes, you can directly call our emergency pharmacy counter at 071-591486 for immediate medicine stock inquiry.',
                    ],
                ],
                'is_featured' => true,
                'display_order' => 6,
            ]
        );

        // 3. Specialist Doctors with Comprehensive Medical Profiles
        $drSushmita = Doctor::updateOrCreate(
            ['slug' => 'dr-sushmita-adhikari'],
            [
                'name' => 'Dr. Sushmita Adhikari',
                'title_prefix' => 'Senior Consultant',
                'specialty' => 'Gynecologist & Obstetrician',
                'designation' => 'Head of Department - Obstetrics & Gynecology',
                'service_id' => $serviceGyn->id,
                'qualification' => 'MBBS (T.U.), MD (OB/GYN) - TUTH, Fellowship in Infertility & Laparoscopy',
                'nmc_number' => 'NMC Reg. No. 12845',
                'experience_years' => '12+ Years',
                'bio' => 'Leading specialist in high-risk pregnancy management, normal deliveries, infertility evaluations, and women reproductive health in Lumbini Province.',
                'biography' => "Dr. Sushmita Adhikari is a distinguished Senior Consultant Gynecologist & Obstetrician with over 12 years of specialized clinical experience. She completed her MBBS and prestigious MD in Obstetrics & Gynecology from the Institute of Medicine (IOM), Tribhuvan University Teaching Hospital (TUTH), Kathmandu.\n\nDr. Adhikari is widely recognized for her compassionate patient communication and dedication to promoting safe, natural, and painless childbirth. Her clinical interests span high-risk obstetrics, repetitive pregnancy loss, polycystic ovarian syndrome (PCOS), and minimally invasive laparoscopic gynecological procedures. Under her leadership, the Maternity Department at Lumbini Health Care Center has become the preferred healthcare destination for expecting families across Bhairahawa, Butwal, and neighboring districts.",
                'expertise_areas' => [
                    'High-Risk Pregnancy & Antenatal Care',
                    'Normal & Painless Vaginal Delivery',
                    '4D Fetal Anomaly Ultrasound Scans',
                    'Infertility Workup, Ovulation Induction & IUI',
                    'Minimally Invasive Laparoscopic Surgery',
                    'PCOS & Adolescent Gynecological Disorders',
                    'Cervical Cancer Screening & Colposcopy',
                ],
                'education_training' => [
                    [
                        'degree' => 'Fellowship in Reproductive Medicine & Laparoscopy',
                        'institution' => 'World Laparoscopy Hospital, New Delhi',
                        'year' => '2017',
                        'notes' => 'Advanced hands-on training in operative laparoscopy and reproductive endocrinology.',
                    ],
                    [
                        'degree' => 'MD - Obstetrics & Gynecology',
                        'institution' => 'Tribhuvan University Teaching Hospital (TUTH / IOM), Kathmandu',
                        'year' => '2014',
                        'notes' => 'Postgraduate residency focusing on maternal-fetal medicine and operative obstetrics.',
                    ],
                    [
                        'degree' => 'MBBS (Bachelor of Medicine & Bachelor of Surgery)',
                        'institution' => 'Institute of Medicine (IOM), Maharajgunj, Kathmandu',
                        'year' => '2009',
                        'notes' => 'Graduated with high clinical honors and distinction in OB/GYN.',
                    ],
                ],
                'awards_recognitions' => [
                    'Life Member - Nepal Society of Obstetricians and Gynaecologists (NESOG)',
                    'Excellence in Maternal Healthcare Award 2023 - Lumbini Province Medical Council',
                    'Life Member - Nepal Medical Association (NMA)',
                    'Certified Advanced Life Support in Obstetrics (ALSO) Provider',
                ],
                'opd_schedule' => "Sunday - Friday: 8:00 AM - 4:00 PM\nSaturday: Emergency Triage / On-Call Rounds",
                'opd_days' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'consultation_fee' => 'Rs. 600',
                'room_number' => 'OPD Suite 101, 1st Floor',
                'phone' => '+977-071-591486',
                'emergency_contact' => '+977-9857012345',
                'email' => 'dr.sushmita@lumbinihealthcare.com',
                'image_url' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=600&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=1200&h=630&q=80',
                'facebook_url' => 'https://www.facebook.com/profile.php?id=100031414824460',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'meta_title' => 'Dr. Sushmita Adhikari - Senior Gynecologist & Obstetrician in Bhairahawa',
                'meta_description' => 'Book an appointment with Dr. Sushmita Adhikari, senior gynecologist in Bhairahawa at Lumbini Health Care Center. Specialized in high-risk pregnancy, normal delivery and infertility.',
                'meta_keywords' => 'dr sushmita adhikari, gynecologist bhairahawa, lady doctor butwal, maternity doctor rupandehi, normal delivery nepal, infertility doctor bhairahawa',
                'canonical_url' => null,
                'is_featured' => true,
                'is_available_for_booking' => true,
                'is_active' => true,
                'display_order' => 1,
            ]
        );

        $drRamesh = Doctor::updateOrCreate(
            ['slug' => 'dr-ramesh-p-chaudhary'],
            [
                'name' => 'Dr. Ramesh P. Chaudhary',
                'title_prefix' => 'Senior Consultant',
                'specialty' => 'Consultant Physician & Cardiologist',
                'designation' => 'Chief of Internal Medicine & Critical Care',
                'service_id' => $serviceMed->id,
                'qualification' => 'MBBS, MD (Internal Medicine), Non-Invasive Cardiology Fellow',
                'nmc_number' => 'NMC Reg. No. 10423',
                'experience_years' => '15+ Years',
                'bio' => 'Renowned diagnostician specializing in cardiovascular wellness, hypertension management, diabetes mellitus, and adult multisystem illnesses.',
                'biography' => "Dr. Ramesh P. Chaudhary is a Senior Consultant Physician and non-invasive cardiologist with over 15 years of dedicated medical service. He completed his MD in Internal Medicine at B.P. Koirala Institute of Health Sciences (BPKIHS), Dharan, followed by specialized fellowship training in preventive and clinical cardiology.\n\nDr. Chaudhary has managed thousands of complex medical cases including resistant hypertension, diabetic complications, ischemic heart disease, and multi-organ critical illness. He believes strongly in holistic prevention, guiding his patients through personalized dietary adjustments, stress reduction, and evidence-based pharmacotherapy.",
                'expertise_areas' => [
                    'Cardiovascular Risk Assessment & Prevention',
                    'Hypertension & Dyslipidemia Management',
                    'Type 1 & Type 2 Diabetes Complication Care',
                    '12-Lead ECG & Echocardiogram Evaluation',
                    'Adult Infectious Diseases, Dengue & Typhoid',
                    'Thyroid, Metabolic & Endocrine Disorders',
                    'Geriatric Health & Multi-Drug Optimization',
                ],
                'education_training' => [
                    [
                        'degree' => 'Fellowship in Non-Invasive Cardiology',
                        'institution' => 'Fortis Escorts Heart Institute, New Delhi',
                        'year' => '2015',
                        'notes' => 'Trained in diagnostic echocardiography, Holter ECG, and cardiac stress testing.',
                    ],
                    [
                        'degree' => 'MD - Internal Medicine',
                        'institution' => 'B.P. Koirala Institute of Health Sciences (BPKIHS), Dharan',
                        'year' => '2011',
                        'notes' => 'Three-year rigorous residency in adult medical wards and intensive care units.',
                    ],
                    [
                        'degree' => 'MBBS',
                        'institution' => 'Manipal College of Medical Sciences, Pokhara',
                        'year' => '2006',
                        'notes' => 'Graduated with university distinction in Pathology and General Medicine.',
                    ],
                ],
                'awards_recognitions' => [
                    'Life Member - Society of Internal Medicine of Nepal (SIMON)',
                    'Executive Member - Nepal Hypertension Society',
                    'Fellow of Association of Physicians of India (FAPI)',
                    'Life Member - Nepal Medical Association (NMA)',
                ],
                'opd_schedule' => "Sunday - Friday: 9:00 AM - 5:00 PM\nSaturday: Special OPD (10:00 AM - 1:00 PM)",
                'opd_days' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'consultation_fee' => 'Rs. 600',
                'room_number' => 'OPD Suite 102, 1st Floor',
                'phone' => '+977-071-591486',
                'emergency_contact' => '+977-9857023456',
                'email' => 'dr.ramesh@lumbinihealthcare.com',
                'image_url' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=1200&h=630&q=80',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'meta_title' => 'Dr. Ramesh P. Chaudhary - Consultant Physician & Cardiologist in Bhairahawa',
                'meta_description' => 'Schedule consultation with Dr. Ramesh P. Chaudhary at Lumbini Health Care Center, Bhairahawa for heart care, diabetes, hypertension, and general medicine.',
                'meta_keywords' => 'dr ramesh chaudhary, physician bhairahawa, heart doctor butwal, diabetes specialist rupandehi, internal medicine nepal',
                'canonical_url' => null,
                'is_featured' => true,
                'is_available_for_booking' => true,
                'is_active' => true,
                'display_order' => 2,
            ]
        );

        $drAnjali = Doctor::updateOrCreate(
            ['slug' => 'dr-anjali-shrestha'],
            [
                'name' => 'Dr. Anjali Shrestha',
                'title_prefix' => 'Senior Consultant',
                'specialty' => 'Senior Pediatrician & Neonatologist',
                'designation' => 'Head of Child Health & Neonatal Care',
                'service_id' => $servicePed->id,
                'qualification' => 'MBBS, MD (Pediatrics) - K.U., Fellowship in Neonatal Intensive Care',
                'nmc_number' => 'NMC Reg. No. 14592',
                'experience_years' => '10+ Years',
                'bio' => 'Dedicated child health specialist providing gentle newborn care, infant nutrition counseling, and comprehensive childhood vaccination regimens.',
                'biography' => "Dr. Anjali Shrestha is a child-friendly and highly regarded Pediatrician and Neonatologist with over a decade of clinical practice. She obtained her MD in Pediatrics from Kathmandu University and has undergone advanced training in neonatal resuscitation and infant developmental assessment.\n\nDr. Anjali creates a welcoming, fear-free clinical environment for children and parents alike. She is passionate about preventive pediatrics, including optimal breastfeeding practices, growth tracking, timely vaccinations, and proactive management of childhood asthma and recurrent infections.",
                'expertise_areas' => [
                    'Newborn & Infant Health Assessments',
                    'Pediatric Asthma, Allergy & Nebulization Care',
                    'National & WHO Recommended Vaccinations',
                    'Childhood Growth & Developmental Screening',
                    'Malnutrition, Stunting & Anemia Correction',
                    'Pediatric Acute Infection & Diarrheal Therapy',
                ],
                'education_training' => [
                    [
                        'degree' => 'Fellowship in Neonatology (NICU)',
                        'institution' => 'Sir Ganga Ram Hospital, New Delhi',
                        'year' => '2018',
                        'notes' => 'Advanced clinical training in extreme preterm infant care and mechanical ventilation.',
                    ],
                    [
                        'degree' => 'MD - Pediatrics & Child Health',
                        'institution' => 'Kathmandu University School of Medical Sciences (KUSMS), Dhulikhel',
                        'year' => '2015',
                        'notes' => 'Distinction thesis on childhood respiratory infections and immunization efficacy.',
                    ],
                    [
                        'degree' => 'MBBS',
                        'institution' => 'Nepal Medical College (NMC), Kathmandu',
                        'year' => '2010',
                        'notes' => 'Best student medal in Pediatrics and Community Medicine.',
                    ],
                ],
                'awards_recognitions' => [
                    'Life Member - Nepal Pediatric Society (NEPAS)',
                    'Certified Neonatal Resuscitation Program (NRP) Instructor',
                    'Life Member - Nepal Medical Association (NMA)',
                ],
                'opd_schedule' => "Sunday - Friday: 10:00 AM - 6:00 PM\nSaturday: On-call pediatric emergency",
                'opd_days' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'consultation_fee' => 'Rs. 500',
                'room_number' => 'OPD Suite 103, 1st Floor (Child Friendly Wing)',
                'phone' => '+977-071-591486',
                'emergency_contact' => '+977-9857034567',
                'email' => 'dr.anjali@lumbinihealthcare.com',
                'image_url' => 'https://images.unsplash.com/photo-1594824813576-a0772242139e?auto=format&fit=crop&w=600&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1594824813576-a0772242139e?auto=format&fit=crop&w=1200&h=630&q=80',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'meta_title' => 'Dr. Anjali Shrestha - Senior Pediatrician & Child Specialist in Bhairahawa',
                'meta_description' => 'Consult Dr. Anjali Shrestha, senior pediatrician in Bhairahawa at Lumbini Health Care Center for child checkups, baby vaccination, and newborn care.',
                'meta_keywords' => 'dr anjali shrestha, child specialist bhairahawa, pediatrician butwal, baby doctor rupandehi, infant vaccination clinic nepal',
                'canonical_url' => null,
                'is_featured' => true,
                'is_available_for_booking' => true,
                'is_active' => true,
                'display_order' => 3,
            ]
        );

        $drBikash = Doctor::updateOrCreate(
            ['slug' => 'dr-bikash-sharma'],
            [
                'name' => 'Dr. Bikash Sharma',
                'title_prefix' => 'Consultant Surgeon',
                'specialty' => 'Consultant Orthopedic & Spine Surgeon',
                'designation' => 'Head of Orthopedics & Trauma Surgery',
                'service_id' => $serviceOrtho->id,
                'qualification' => 'MBBS, MS (Orthopedics) - NAMS (Bir Hospital), AO Trauma Fellow',
                'nmc_number' => 'NMC Reg. No. 13204',
                'experience_years' => '11+ Years',
                'bio' => 'Specialist in bone fracture care, joint preservation, sciatica management, sports injuries, and conservative arthritis treatments in Rupandehi.',
                'biography' => "Dr. Bikash Sharma is an experienced Consultant Orthopedic and Spine Surgeon. He completed his MS in Orthopedics from the National Academy of Medical Sciences (NAMS), Bir Hospital, Kathmandu, and achieved international AO Trauma fellowship certification.\n\nDr. Sharma focuses on minimizing surgical invasiveness wherever possible. He employs advanced non-surgical modalities, intra-articular therapies, precision casting, and evidence-guided physiotherapy protocols for knee osteoarthritis, frozen shoulder, chronic low back strain, and sports-related tendon/ligament injuries.",
                'expertise_areas' => [
                    'Fracture Reduction & Plaster Splinting',
                    'Knee, Hip & Shoulder Arthritis Preservation',
                    'Sciatica, Lumbar Disc & Neck Pain Management',
                    'Intra-articular PRP & Hyaluronic Injections',
                    'Sports Ligament & Muscle Strain Rehabilitation',
                    'Osteoporosis Screening & Bone Mineralization Care',
                ],
                'education_training' => [
                    [
                        'degree' => 'AO Trauma Fellowship in Fracture Management',
                        'institution' => 'AO Foundation, Davos, Switzerland / India',
                        'year' => '2019',
                        'notes' => 'International certification in modern biological fracture fixation and trauma care.',
                    ],
                    [
                        'degree' => 'MS - Orthopedic Surgery',
                        'institution' => 'National Academy of Medical Sciences (NAMS), Bir Hospital, Kathmandu',
                        'year' => '2015',
                        'notes' => 'Comprehensive surgical residency in major trauma, joint reconstruction, and spine care.',
                    ],
                    [
                        'degree' => 'MBBS',
                        'institution' => 'Universal College of Medical Sciences (UCMS), Bhairahawa',
                        'year' => '2010',
                        'notes' => 'Graduated with clinical honors in Surgery and Orthopedics.',
                    ],
                ],
                'awards_recognitions' => [
                    'Life Member - Nepal Orthopedic Association (NOA)',
                    'Member - AO Trauma Asia Pacific',
                    'Life Member - Nepal Medical Association (NMA)',
                ],
                'opd_schedule' => "Sunday - Friday: 8:00 AM - 3:00 PM\nSaturday: Emergency Fracture Triage",
                'opd_days' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'consultation_fee' => 'Rs. 600',
                'room_number' => 'OPD Suite 104, 1st Floor',
                'phone' => '+977-071-591486',
                'emergency_contact' => '+977-9857045678',
                'email' => 'dr.bikash@lumbinihealthcare.com',
                'image_url' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=1200&h=630&q=80',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'meta_title' => 'Dr. Bikash Sharma - Consultant Orthopedic Surgeon in Bhairahawa',
                'meta_description' => 'Book appointment with Dr. Bikash Sharma, orthopedic and spine surgeon in Bhairahawa at Lumbini Health Care Center. Expert fracture, arthritis, and joint pain care.',
                'meta_keywords' => 'dr bikash sharma, orthopedic doctor bhairahawa, bone specialist butwal, joint pain clinic rupandehi, fracture plaster doctor nepal',
                'canonical_url' => null,
                'is_featured' => true,
                'is_available_for_booking' => true,
                'is_active' => true,
                'display_order' => 4,
            ]
        );

        $drPradip = Doctor::updateOrCreate(
            ['slug' => 'dr-pradip-neupane'],
            [
                'name' => 'Dr. Pradip Neupane',
                'title_prefix' => 'Consultant Radiologist',
                'specialty' => 'Consultant Radiologist & Sonologist',
                'designation' => 'Head of Diagnostic Sonography & Imaging',
                'service_id' => $serviceDiag->id,
                'qualification' => 'MBBS, MD (Radiodiagnosis) - T.U.',
                'nmc_number' => 'NMC Reg. No. 15871',
                'experience_years' => '8+ Years',
                'bio' => 'Expert sonologist specializing in 4D fetal anomaly scans, color Doppler vascular studies, musculoskeletal ultrasonography, and precision radiology.',
                'biography' => "Dr. Pradip Neupane is a dedicated Radiologist and Sonologist with deep clinical expertise in ultrasound imaging. He completed his post-graduation (MD in Radiodiagnosis) under Tribhuvan University.\n\nDr. Neupane works closely with the gynecology, orthopedic, and general medicine teams to provide high-resolution ultrasound diagnoses. His specialized areas include early anomaly screening, umbilical/uterine Doppler assessments in high-risk pregnancies, abdominal pathology, and real-time guidance for cyst aspirations.",
                'expertise_areas' => [
                    '4D Fetal Anomaly Ultrasound Scans',
                    'Obstetric & Gynecological Sonography',
                    'Abdominal & Pelvic Color Doppler Studies',
                    'Thyroid, Neck & Scrotal High-Frequency USG',
                    'Musculoskeletal (MSK) Tendon & Joint Sonography',
                    'Digital Radiography & X-Ray Diagnostics',
                ],
                'education_training' => [
                    [
                        'degree' => 'MD - Radiodiagnosis & Imaging',
                        'institution' => 'Tribhuvan University Teaching Hospital (TUTH / IOM), Kathmandu',
                        'year' => '2018',
                        'notes' => 'Specialized in multi-modality diagnostic sonography and Doppler studies.',
                    ],
                    [
                        'degree' => 'MBBS',
                        'institution' => 'Kathmandu Medical College (KMC), Sinamangal',
                        'year' => '2013',
                        'notes' => 'Distinction in Anatomy, Pathology, and Radiology rotation.',
                    ],
                ],
                'awards_recognitions' => [
                    'Life Member - Nepal Radiologists Association (NRA)',
                    'Certified Fetal Medicine Foundation (FMF) Anomaly Scan Practitioner',
                    'Life Member - Nepal Medical Association (NMA)',
                ],
                'opd_schedule' => "Sunday - Saturday: 7:00 AM - 7:00 PM\nEmergency USG Available 24/7 on call",
                'opd_days' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                'consultation_fee' => 'Rs. 500',
                'room_number' => 'USG Suite B-1, Ground Floor',
                'phone' => '+977-071-591486',
                'emergency_contact' => '+977-9857056789',
                'email' => 'dr.pradip@lumbinihealthcare.com',
                'image_url' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                'og_image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=1200&h=630&q=80',
                'facebook_url' => 'https://facebook.com',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'meta_title' => 'Dr. Pradip Neupane - Consultant Radiologist & Sonologist in Bhairahawa',
                'meta_description' => 'Get 4D ultrasound and color Doppler scans from Dr. Pradip Neupane at Lumbini Health Care Center, Bhairahawa. Accurate diagnostic reporting.',
                'meta_keywords' => 'dr pradip neupane, ultrasound doctor bhairahawa, usg radiologist butwal, 4d scan sonologist rupandehi, color doppler doctor',
                'canonical_url' => null,
                'is_featured' => true,
                'is_available_for_booking' => true,
                'is_active' => true,
                'display_order' => 5,
            ]
        );

        // 4. Testimonials
        Testimonial::updateOrCreate(
            ['patient_name' => 'Sunita Gautam'],
            [
                'patient_role' => 'Maternity Patient, Bhairahawa',
                'avatar_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'review' => 'Dr. Sushmita and the nursing staff at Lumbini Health Care Center provided exceptional care during my pregnancy and delivery. Their prompt response and hygienic setup gave our family complete peace of mind!',
                'is_active' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['patient_name' => 'Bikash Thapa'],
            [
                'patient_role' => 'Cardiology Patient, Siddharthanagar',
                'avatar_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'review' => 'The digital ECG and consultation with Dr. Ramesh was smooth and thorough. The doctor took ample time to review my reports and explain lifestyle changes instead of just prescribing medicines.',
                'is_active' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['patient_name' => 'Pooja Pandey'],
            [
                'patient_role' => 'Parent, Butwal',
                'avatar_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'review' => 'Best pediatric consultation in the region! The staff is exceedingly gentle with infants, and the appointment booking system saves hours of waiting in line.',
                'is_active' => true,
            ]
        );

        // 5. Blog Posts
        BlogPost::updateOrCreate(
            ['slug' => 'essential-prenatal-care-guide'],
            [
                'title' => 'Essential Prenatal Care Guide for Expecting Mothers in Lumbini',
                'category' => 'Women Health',
                'excerpt' => 'Discover critical trimester-by-trimester nutritional advice, ultrasound timelines, and warning signs every expectant parent must know.',
                'content' => 'Regular prenatal checkups are the cornerstone of a safe pregnancy. At Lumbini Health Care Center, our obstetricians recommend early anomaly scans, balanced iron-folic acid intake, and frequent blood pressure monitoring to ensure both maternal and fetal well-being...',
                'image_url' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                'author_name' => 'Dr. Sushmita Adhikari',
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ]
        );

        BlogPost::updateOrCreate(
            ['slug' => 'preventive-health-checkups-save-lives'],
            [
                'title' => 'Preventive Health Checkups: Why Routine Diagnostics Save Lives',
                'category' => 'Preventive Care',
                'excerpt' => 'Catch silent killers like hypertension, high blood sugar, and fatty liver early through annual basic blood panels and sonography screenings.',
                'content' => 'Modern healthcare is shifting from reactive treatment to proactive wellness. Routine screening packages allow physicians to detect asymptomatic conditions before irreversible organ strain occurs...',
                'image_url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80',
                'author_name' => 'Dr. Ramesh P. Chaudhary',
                'published_at' => now()->subDays(12),
                'is_published' => true,
            ]
        );

        // 6. Sample Initial Appointments
        Appointment::updateOrCreate(
            ['patient_phone' => '9847012345'],
            [
                'patient_name' => 'Anil Kumar Yadav',
                'patient_email' => 'anil.yadav@example.com',
                'doctor_id' => $drRamesh->id,
                'service_id' => $serviceMed->id,
                'appointment_date' => now()->addDays(2),
                'appointment_time' => '10:30 AM',
                'message' => 'Routine follow-up for blood pressure check and lipid profile review.',
                'status' => 'confirmed',
            ]
        );

        Appointment::updateOrCreate(
            ['patient_phone' => '9801234567'],
            [
                'patient_name' => 'Sarita Magar',
                'patient_email' => 'sarita.m@example.com',
                'doctor_id' => $drSushmita->id,
                'service_id' => $serviceGyn->id,
                'appointment_date' => now()->addDays(3),
                'appointment_time' => '02:00 PM',
                'message' => 'First trimester ultrasound scan and consultation.',
                'status' => 'pending',
            ]
        );
    }
}
