<!DOCTYPE html>
<html lang="zh">
@include('layout.head')

<body>
@include('layout.nav')

<div class="d-flex">
    @include('layout.sidebar')

    <div class="shadow-lg  p-10 m-2 documentation is-dark" :class="{'expanded': ! sidebar}">
        <div class="row">

            <div class="col-11">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <div id="item-1">
                        <h2 class="blog-post-title mb-1">Fetch</h2>
                        {{-- section: main info and intro --}}
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-tags"></i>
                            <a href="https://cathdb.info/" target="_blank" class="stretched-link text-success" style="position: relative;">
                                <strong>Cath</strong></a> is a protein structural classification database that currently has
                            more than 100 million protein domains that are classified into thousands of superfamilies.

                            <br><br>
                            <strong>TMKit</strong> provides a module <code>tmkit.cath</code> to access the Cath database.

                            In this tutorial, we will show how we can use this function using TMKit.

                        </div>

                        {{-- section: example dataset reminder --}}
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-circle-check"></i>
                            Please make sure that the TMKit example dataset has been downloaded
                            before you walk through the tutorial (please refer to
                            <a href="{{ url('doc/exdataset') }}" target="_blank" class="stretched-link text-info" style="position: relative;">
                                here</a>).
                        </div>
                    </div>

                    <div id="item-1-1">
                        <h2>1. Links to domain and family</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            <strong>TMKit</strong> accesses the information about the domains and families
                            of a protein by using parameter <code>id</code>. For example, if you are interested in
                            protein <code>1cuk</code> chain <code>A</code>, we can generate the links to
                            its domain <code>01</code>. Thus, we can do it this way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.cath.summary_by_id(
    id='1cukA01'
)
print(res)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>id</code> - protein name + chain + domain, e.g., 1cukA01 (1cuk+A+01)
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The result is made in JSON format as shown below. The detailed information about
                            its domain <code>domain</code> can be seen by opening the link that follows it.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">{'domain': 'http://www.cathdb.info/version/v4_2_0/api/rest/domain_summary/1cukA01', 'funfam': 'http://www.cathdb.info/version/v4_2_0/api/rest/superfamily/1.10.8.10/funfam/1cukA01', 'superfamily': 'http://www.cathdb.info/version/v4_2_0/api/rest/superfamily/1cukA01'}</code></pre>
                        </div>
                    </div>

                    <div id="item-1-2">
                        <h2>2. Details about domain and family</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            <strong>TMKit</strong> accesses the information about the domains and families
                            of a protein by using parameter <code>id</code>. For example, if you are interested in
                            protein <code>1cuk</code> chain <code>A</code>, we can see the detailed information
                            of domain <code>01</code>. Thus, we can do it this way.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

res = tmk.cath.fetch_by_id(
    id='1cukA01'
)
print(res)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>id</code> - protein name + chain + domain, e.g., 1cukA01 (1cuk+A+01)
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The detailed information about its domain is made in JSON format as shown below.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">{'atom_length': 66, 's35_id': '2.40.50.140.109', 'combs_segments': [{'pdb_code': '1cuk', 'stop': '66', 'chain_code': 'A', 'start': '1'}], 'residues': [{'pdbres': '1', 'seqres': 1, 'aa': 'M'}, {'pdbres': '2', 'seqres': 2, 'aa': 'I'}, {'pdbres': '3', 'seqres': 3, 'aa': 'G'}, {'pdbres': '4', 'seqres': 4, 'aa': 'R'}, {'pdbres': '5', 'seqres': 5, 'aa': 'L'}, {'pdbres': '6', 'seqres': 6, 'aa': 'R'}, {'pdbres': '7', 'seqres': 7, 'aa': 'G'}, {'pdbres': '8', 'seqres': 8, 'aa': 'I'}, {'pdbres': '9', 'seqres': 9, 'aa': 'I'}, {'pdbres': '10', 'seqres': 10, 'aa': 'I'}, {'pdbres': '11', 'seqres': 11, 'aa': 'E'}, {'pdbres': '12', 'seqres': 12, 'aa': 'K'}, {'pdbres': '13', 'seqres': 13, 'aa': 'Q'}, {'pdbres': '14', 'seqres': 14, 'aa': 'P'}, {'pdbres': '15', 'seqres': 15, 'aa': 'P'}, {'pdbres': '16', 'seqres': 16, 'aa': 'L'}, {'pdbres': '17', 'seqres': 17, 'aa': 'V'}, {'pdbres': '18', 'seqres': 18, 'aa': 'L'}, {'pdbres': '19', 'seqres': 19, 'aa': 'I'}, {'pdbres': '20', 'seqres': 20, 'aa': 'E'}, {'pdbres': '21', 'seqres': 21, 'aa': 'V'}, {'pdbres': '22', 'seqres': 22, 'aa': 'G'}, {'pdbres': '23', 'seqres': 23, 'aa': 'G'}, {'pdbres': '24', 'seqres': 24, 'aa': 'V'}, {'pdbres': '25', 'seqres': 25, 'aa': 'G'}, {'pdbres': '26', 'seqres': 26, 'aa': 'Y'}, {'pdbres': '27', 'seqres': 27, 'aa': 'E'}, {'pdbres': '28', 'seqres': 28, 'aa': 'V'}, {'pdbres': '29', 'seqres': 29, 'aa': 'H'}, {'pdbres': '30', 'seqres': 30, 'aa': 'M'}, {'pdbres': '31', 'seqres': 31, 'aa': 'P'}, {'pdbres': '32', 'seqres': 32, 'aa': 'M'}, {'pdbres': '33', 'seqres': 33, 'aa': 'T'}, {'pdbres': '34', 'seqres': 34, 'aa': 'C'}, {'pdbres': '35', 'seqres': 35, 'aa': 'F'}, {'pdbres': '36', 'seqres': 36, 'aa': 'Y'}, {'pdbres': '37', 'seqres': 37, 'aa': 'E'}, {'pdbres': '38', 'seqres': 38, 'aa': 'L'}, {'pdbres': '39', 'seqres': 39, 'aa': 'P'}, {'pdbres': '40', 'seqres': 40, 'aa': 'E'}, {'pdbres': '41', 'seqres': 41, 'aa': 'A'}, {'pdbres': '42', 'seqres': 42, 'aa': 'G'}, {'pdbres': '43', 'seqres': 43, 'aa': 'Q'}, {'pdbres': '44', 'seqres': 44, 'aa': 'E'}, {'pdbres': '45', 'seqres': 45, 'aa': 'A'}, {'pdbres': '46', 'seqres': 46, 'aa': 'I'}, {'pdbres': '47', 'seqres': 47, 'aa': 'V'}, {'pdbres': '48', 'seqres': 48, 'aa': 'F'}, {'pdbres': '49', 'seqres': 49, 'aa': 'T'}, {'pdbres': '50', 'seqres': 50, 'aa': 'H'}, {'pdbres': '51', 'seqres': 51, 'aa': 'F'}, {'pdbres': '52', 'seqres': 52, 'aa': 'V'}, {'pdbres': '53', 'seqres': 53, 'aa': 'V'}, {'pdbres': '54', 'seqres': 54, 'aa': 'R'}, {'pdbres': '55', 'seqres': 55, 'aa': 'E'}, {'pdbres': '56', 'seqres': 56, 'aa': 'D'}, {'pdbres': '57', 'seqres': 57, 'aa': 'A'}, {'pdbres': '58', 'seqres': 58, 'aa': 'Q'}, {'pdbres': '59', 'seqres': 59, 'aa': 'L'}, {'pdbres': '60', 'seqres': 60, 'aa': 'L'}, {'pdbres': '61', 'seqres': 61, 'aa': 'Y'}, {'pdbres': '62', 'seqres': 62, 'aa': 'G'}, {'pdbres': '63', 'seqres': 63, 'aa': 'F'}, {'pdbres': '64', 'seqres': 64, 'aa': 'N'}, {'pdbres': '65', 'seqres': 65, 'aa': 'N'}, {'pdbres': '66', 'seqres': 66, 'aa': 'K'}], 'funfam_number': 58874, 'cath_id': '2.40.50.140.109.1.1.1.1', 'superfamily_id': '2.40.50.140', 'domain_id': '1cukA01', 'pdb_segments': [{'pdb_code': '1cuk', 'stop': '66', 'chain_code': 'A', 'start': '1'}], 'ssg5_number': 12, 'ec_terms': [{'alternative_names': None, 'cofactors': None, 'reaction': 'ATP + H(2)O = ADP + phosphate.', 'comments': "-!- DNA helicases utilize the energy from ATP hydrolysis to unwind double-stranded DNA. -!- Some of them unwind duplex DNA with a 3' to 5' polarity (1,3,5,8), other show 5' to 3' polarity (10,11,12,13) or unwind DNA in both directions (14,15). -!- Some helicases unwind DNA as well as RNA (4,9). -!- May be identical with EC 3.6.4.13 (RNA helicase).", 'description': 'DNA helicase.', 'ec_code': '3.6.4.12', 'uniprot_acc': 'P0A809'}], 'go_terms': [{'term_type': 'biological_process', 'go_acc': 'GO:0000725', 'name': 'recombinational repair', 'evidence': 'IMP', 'definition': 'A DNA repair process that involves the exchange, reciprocal or nonreciprocal, of genetic material between the broken DNA molecule and a homologous region of DNA.'}, {'term_type': 'molecular_function', 'go_acc': 'GO:0009378', 'name': 'four-way junction helicase activity', 'evidence': 'IDA', 'definition': 'Catalysis of the unwinding of the DNA helix of DNA containing four-way junctions, including Holliday junctions.'}, {'term_type': 'cellular_component', 'go_acc': 'GO:0009379', 'name': 'Holliday junction helicase complex', 'evidence': 'IDA', 'definition': 'A DNA helicase complex that forms part of a Holliday junction resolvase complex, where the helicase activity is involved in the migration of the junction branch point. The best-characterized example is the E. coli RuvAB complex, in which a hexamer of RuvB subunits possesses helicase activity that is modulated by association with RuvA.'}, {'term_type': 'biological_process', 'go_acc': 'GO:0009432', 'name': 'SOS response', 'evidence': 'IEP', 'definition': 'An error-prone process for repairing damaged microbial DNA.'}, {'term_type': 'biological_process', 'go_acc': 'GO:0009432', 'name': 'SOS response', 'evidence': 'RCA', 'definition': 'An error-prone process for repairing damaged microbial DNA.'}, {'term_type': 'cellular_component', 'go_acc': 'GO:0048476', 'name': 'Holliday junction resolvase complex', 'evidence': 'IDA', 'definition': 'A protein complex that mediates the conversion of a Holliday junction into two separate duplex DNA molecules; the complex includes a single- or multisubunit helicase that catalyzes the extension of heteroduplex DNA by branch migration and a nuclease that resolves the junction by nucleolytic cleavage.'}], 'pdb_code': '1cuk', 'ssg9_number': 12, 'atom_sequence': 'MIGRLRGIIIEKQPPLVLIEVGGVGYEVHMPMTCFYELPEAGQEAIVFTHFVVREDAQLLYGFNNK', 'combs_sequence': 'MIGRLRGIIIEKQPPLVLIEVGGVGYEVHMPMTCFYELPEAGQEAIVFTHFVVREDAQLLYGFNNK'}</code></pre>
                        </div>
                    </div>

                    <div id="item-1-3">
                        <h2>3. The entire Cath database</h2>
                        {{-- section: intro --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            If you would like to access the domain information for all available proteins,
                            we can use the <code>tmk.cath.read</code> function. Before that, we need to retrieve
                            a Cath database. By default, we get the newest version and save it in
                            <code>'./data/cath/'</code> as shown below.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

tmk.cath.download(
    version='newest',
    sv_fp='./data/cath/'
)</code></pre>

                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The file will be automatically decompressed into <code>'./data/cath/cath-b-newest-all.txt'</code>.
                        </div>
                        <pre><code class="language-python">import tmkit as tmk

df = tmk.cath.read(
    cath_fpn='./data/cath/cath-b-newest-all.txt',
    groupby='version',
    group='v4_2_0',
)
print(df)</code></pre>

                        {{-- section: parameter illustration --}}
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-solid fa-gear"></i>
                            <strong>Parameter illustration</strong>
                            <br><code>version</code> - version of the Cath database
                            <br><code>sv_fpn</code> - path to save the Cath database
                            <br><code>cath_fpn</code> - path to the downloaded Cath database
                            <br><code>groupby</code> - metric used to group data, e.g., <code>version</code>. There are 4 metrics in total, i.e., <code>domain</code>, <code>version</code>, <code>superfamily</code>, and <code>bound</code>.
                            <br><code>group</code> - value of a metric. For example, if <code>version</code> is chosen, there are two, namely, <code>v4_2_0</code> and <code>putative</code>.
                            <br>->see <a href="{{ url('doc/feature') }}" target="_blank"
                                         class="stretched-link text-info" style="position: relative;">here</a>
                            for understanding our naming system of parameters.
                        </div>

                        {{-- section: output --}}
                        <div class="alert alert-secondary" role="alert">
                            <i class="fa-solid fa-file-pen"></i>
                            The result is made as a Pandas dataframe.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            <i class="fa-solid fa-print"></i>
                            <strong>Output</strong>
                            <pre><code class="language-python">======>reading CATH...
======>CATH features are:
=========>No.1: domain
=========>No.2: version
=========>No.3: superfamily
=========>No.4: bound
         domain version  superfamily    bound
0       101mA00  v4_2_0  1.10.490.10  0-153:A
1       102lA00  v4_2_0  1.10.530.40  1-162:A
2       102mA00  v4_2_0  1.10.490.10  0-153:A
3       103lA00  v4_2_0  1.10.530.40  1-162:A
4       103mA00  v4_2_0  1.10.490.10  0-153:A
...         ...     ...          ...      ...
439144  9xiaA00  v4_2_0  3.20.20.150  1-387:A
439145  9ximA00  v4_2_0  3.20.20.150  3-394:A
439146  9ximB00  v4_2_0  3.20.20.150  3-394:B
439147  9ximC00  v4_2_0  3.20.20.150  4-394:C
439148  9ximD00  v4_2_0  3.20.20.150  3-394:D

[439149 rows x 4 columns]</code></pre>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Fetch</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">1. Links to domain and family</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">2. Details about domain and family</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-3">3. The entire Cath database</a>
                </nav>
            </nav>
        </nav>
    </div>
</div>


@include('layout.footer')
</body>

@include('layout.script')
</html>
