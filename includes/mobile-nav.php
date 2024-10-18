<div class="d-block d-sm-none mt-5 pt-5">
    <div class="position-fixed bottom-0 start-0 end-0 bg-light border-top" style="z-index: 1050">
        <div class="container py-2">
            <div class="d-flex justify-content-around">

                <div class="text-center">
                    <a href="index.php" class="<?php echo ($currentRoute === 'dashboard') ? 'nav-link active text-dark border-bottom border-3 border-primary' : 'nav-link text-muted hover-link'; ?>">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-wrapper <?php echo ($currentRoute === 'dashboard') ? 'active' : ''; ?>">
                                <i class="fas fa-tachometer-alt" style="font-size: 1.67em;"></i>
                            </div>
                            <span class="ps-2 pe-2 pb-2 fw-bold text-wrapper <?php echo ($currentRoute === 'dashboard') ? 'active' : ''; ?>">Dashboard</span>
                        </div>
                    </a>
                </div>

                <div class="text-center">
                    <a href="controls.php" class="<?php echo ($currentRoute === 'controls') ? 'nav-link active text-dark border-bottom border-3 border-primary' : 'nav-link text-muted hover-link'; ?>">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-wrapper <?php echo ($currentRoute === 'controls') ? 'active' : ''; ?>">
                                <i class="fas fa-sliders-h" style="font-size: 1.67em;"></i>
                            </div>
                            <span class="ps-2 pe-2 pb-2 fw-bold text-wrapper <?php echo ($currentRoute === 'controls') ? 'active' : ''; ?>">Controls</span>
                        </div>
                    </a>
                </div>

                <div class="text-center">
                    <a href="historical-data.php" class="<?php echo ($currentRoute === 'historical') ? 'nav-link active text-dark border-bottom border-3 border-primary' : 'nav-link text-muted hover-link'; ?>">
                        <div class="d-flex flex-column align-items-center">
                            <div class="icon-wrapper <?php echo ($currentRoute === 'historical') ? 'active' : ''; ?>">
                                <i class="fas fa-history" style="font-size: 1.67em;"></i>
                            </div>
                            <span class="ps-2 pe-2 pb-2 fw-bold text-wrapper <?php echo ($currentRoute === 'historical') ? 'active' : ''; ?>">Historical Data</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>